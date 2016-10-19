<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTraining extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('certificate');
            $table->date('date');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('student_trainings');
    }
}
