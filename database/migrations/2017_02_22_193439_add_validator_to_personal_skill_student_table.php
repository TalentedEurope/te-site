<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValidatorToPersonalSkillStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_skill_student', function ($table) {
            $table->boolean('validator')->default(false);
            $table->dropPrimary('pk_key');
        });

        Schema::table('personal_skill_student', function ($table) {
            $table->primary(['personal_skill_id', 'student_id','validator'], 'pk_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_skill_student', function ($table) {
            $table->dropcolumn('validator');
            $table->dropPrimary('pk_key');
        });

        Schema::table('personal_skill_student', function ($table) {
            $table->primary(['personal_skill_id', 'student_id'], 'pk_key');
        });
    }
}
