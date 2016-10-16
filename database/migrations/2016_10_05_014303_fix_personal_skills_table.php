<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class FixPersonalSkillsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('personal_skills', function ($table) {
            $table->dropColumn('name_en');
            $table->dropColumn('name_sp');
            $table->dropColumn('name_it');
            $table->dropColumn('name_de');
            $table->dropColumn('name_fr');
            $table->string('en');
            $table->string('es');
            $table->string('it');
            $table->string('de');
            $table->string('fr');
            $table->string('sk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('personal_skills', function ($table) {
            $table->dropColumn('en');
            $table->dropColumn('es');
            $table->dropColumn('it');
            $table->dropColumn('de');
            $table->dropColumn('fr');
            $table->dropColumn('sk');
            $table->string('name_en');
            $table->string('name_sp');
            $table->string('name_it');
            $table->string('name_de');
            $table->string('name_fr');
        });
    }
}
