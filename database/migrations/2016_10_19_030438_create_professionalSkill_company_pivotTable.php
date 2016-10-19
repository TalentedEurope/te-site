<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalSkillCompanyPivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company_professional_skill', function (Blueprint $table) {
            $table->integer('professional_skill_id')->unsigned()->index();
            $table->foreign('professional_skill_id', 'psc_id_foreign')->references('id')->on('professional_skills')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id', 'ps_cp_id_foreign')->references('id')->on('companies')->onDelete('cascade');
            $table->primary(['professional_skill_id', 'company_id'], 'pk_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('company_professional_skill');
    }
}
