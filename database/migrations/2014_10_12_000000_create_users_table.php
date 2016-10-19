<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('image');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->enum('country', array_keys(User::$countries))->nullable();
            $table->integer('userable_id');
            $table->string('userable_type');
            $table->boolean('notify_me')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
