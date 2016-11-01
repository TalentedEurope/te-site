<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateProfessionalSkillsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('professional_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('language_code', Config::get('app.languages'));
            $table->string('name');
            $table->unique(array('language_code', 'name'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('professional_skills');
    }
}
