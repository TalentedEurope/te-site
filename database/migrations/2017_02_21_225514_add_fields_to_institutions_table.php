<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\Models\Institution;

class AddFieldsToInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institutions', function ($table) {
            $table->string('certificate');
            $table->string('pic');
            $table->dropColumn('type');
        });
        Schema::table('institutions', function ($table) {
            $table->enum('type', Institution::$types)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institutions', function ($table) {
            $table->dropColumn('certificate');
            $table->dropColumn('pic');
        });
    }
}
