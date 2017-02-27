<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToValidatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('validators', function ($table) {
            $table->dropForeign('validators_institution_id_foreign');
            $table->dropColumn('institution_id');
        });

        Schema::table('validators', function ($table) {
            $table->integer('institution_id')->unsigned()->nullable();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('set null');
            $table->boolean('enabled')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validators', function ($table) {
            $table->dropForeign('validators_institution_id_foreign');
            $table->dropColumn('institution_id');
            $table->dropColumn('enabled');
        });

        Schema::table('validators', function ($table) {
            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
        });
    }
}
