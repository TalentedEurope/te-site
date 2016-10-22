<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Company;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('overseer');
            $table->string('fiscal_id');
            $table->string('website');
            $table->string('talent');
            $table->string('notification_email');
            $table->string('notification_name');
            $table->enum('activity', Company::$activities)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
