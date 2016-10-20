<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalSkillStudentPivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('professional_skill_student', function (Blueprint $table) {
            $table->integer('professional_skill_id')->unsigned()->index();
            $table->foreign('professional_skill_id', 'ps_id_foreign')->references('id')->on('professional_skills')->onDelete('cascade');
            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id', 'ps_st_id_foreign')->references('id')->on('students')->onDelete('cascade');
            $table->primary(['professional_skill_id', 'student_id'], 'pk_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('professional_skill_student');
    }
}
