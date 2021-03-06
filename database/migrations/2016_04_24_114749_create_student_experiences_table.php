<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->date('from');
            $table->date('until');
            $table->string('position');
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
        Schema::drop('student_experiences');
    }
}
