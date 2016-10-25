<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPersonalSkillsPivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company_personal_skill', function (Blueprint $table) {
            $table->integer('personal_skill_id')->unsigned()->index();
            $table->foreign('personal_skill_id', 'pscp-foreign')->references('id')->on('personal_skills')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id', 'pscc-foreign')->references('id')->on('companies')->onDelete('cascade');
            $table->primary(['personal_skill_id', 'company_id'], 'pk_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('company_personal_skill');
    }
}
