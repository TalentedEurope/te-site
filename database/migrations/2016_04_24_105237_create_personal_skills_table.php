<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_skills', function (Blueprint $table) {
            $table->increments('id');
            $table-> string('name_en');
            $table-> string('name_sp');
            $table-> string('name_it');
            $table-> string('name_de');
            $table-> string('name_fr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personal_skills');
    }
}
