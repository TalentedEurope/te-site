<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLockedToStudentRelatedColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_studies', function ($table) {
            $table->boolean('locked')->default(false);
        });
        Schema::table('student_trainings', function ($table) {
            $table->boolean('locked')->default(false);
        });
        Schema::table('student_languages', function ($table) {
            $table->boolean('locked')->default(false);
        });
        Schema::table('student_experiences', function ($table) {
            $table->boolean('locked')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_studies', function ($table) {
            $table->dropColumn('locked');
        });
        Schema::table('student_trainings', function ($table) {
            $table->dropColumn('locked');
        });
        Schema::table('student_languages', function ($table) {
            $table->dropColumn('locked');
        });
        Schema::table('student_experiences', function ($table) {
            $table->dropColumn('locked');
        });
    }
}
