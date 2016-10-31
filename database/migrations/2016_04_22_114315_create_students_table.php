<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Student;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('nationality', Student::$nationalities);
            $table->string('photo');
            $table->date('birthdate');
            $table->integer('institution_id')->unsigned()->nullable();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->string('curriculum');
            $table->string('talent', 300);
            $table->boolean('valid')->default(false);
            $table->boolean('private')->default(false);
            $table->date('renewed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('students');
    }
}
