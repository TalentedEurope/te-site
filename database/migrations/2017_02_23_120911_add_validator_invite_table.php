<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValidatorInviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validator_invites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('uid')->unique();
            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('validator_invites');
    }
}
