<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_languages', function (Blueprint $table) {
            $table->increments('id');
            $table-> string('name');
            $table->enum('level', ['Lang_level_A1','Lang_level_A2','Lang_level_B1','Lang_level_B2','Lang_level_C1','Lang_level_C2']);
            $table->string('certificate');
            $table->boolean('first_language');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_languages');
    }
}
