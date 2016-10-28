<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\StudentStudy;

class CreateStudyKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_keywords', function (Blueprint $table) {
            $table->enum('field', StudentStudy::$fields);
            $table->text('en')->nullable();
            $table->text('es')->nullable();
            $table->text('it')->nullable();
            $table->text('de')->nullable();
            $table->text('fr')->nullable();
            $table->text('sk')->nullable();
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
        Schema::drop('study_keywords');
    }
}
