<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Company;

class CreateCompanyKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_keyword', function (Blueprint $table) {
            $table->enum('field', Company::$activities);
            $table->text('entity_type', 150)->nullable();
            $table->boolean('only_owned')->default(false);
            $table->timestamps();
            $table->primary('field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_keyword');
    }
}
