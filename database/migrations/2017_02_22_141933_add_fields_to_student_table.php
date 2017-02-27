<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ValidationRequest;

class AddFieldsToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function ($table) {
            $table->dropColumn('valid');
        });
        Schema::table('students', function ($table) {
            $table->enum('valid', ValidationRequest::$status)->default(ValidationRequest::$status[0]);
            $table->string('validation_comment', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function ($table) {
            $table->dropColumn('valid');
            $table->dropColumn('validation_comment');
        });

        Schema::table('students', function ($table) {
            $table->boolean('valid')->default(false);
        });
    }
}
