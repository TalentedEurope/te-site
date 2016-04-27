<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\StudentStudy;

class CreateStudentStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_studies', function (Blueprint $table) {
            $table->increments('id');
            $table-> string('name');
            $table->enum('level', StudentStudy::$levels);  
            $table->string('certificate');
            $table->string('gradecard');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_studies');
    }
}
