<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\StudentLanguage;

class CreateStudentLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('name', array_keys(StudentLanguage::$languages));
            $table->enum('level', StudentLanguage::$levels);
            $table->string('certificate');
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
        Schema::drop('student_languages');
    }
}
