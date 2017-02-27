<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToValidationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('validation_requests', function ($table) {
            $table->dropForeign('validation_requests_validator_id_foreign');
            $table->dropColumn('validator_id');
        });

        Schema::table('validation_requests', function ($table) {
            $table->integer('validator_id')->unsigned()->nullable();
            $table->foreign('validator_id')->references('id')->on('validators')->onDelete('cascade');

            $table->integer('institution_id')->unsigned()->nullable();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->boolean('assigned')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validation_requests', function ($table) {
            $table->dropForeign('validation_requests_validator_id_foreign');
            $table->dropColumn('validator_id');
        });

        Schema::table('validation_requests', function ($table) {
            $table->integer('validator_id')->unsigned();
            $table->foreign('validator_id')->references('id')->on('validators')->onDelete('cascade');
        });
    }
}
