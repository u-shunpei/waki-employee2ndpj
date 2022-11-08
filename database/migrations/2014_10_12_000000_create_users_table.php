<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('img_name')->default('');
            $table->string('img_name2')->default('')->nullable();
            $table->string('img_name3')->default('')->nullable();
            $table->string('self_introduction', 500)->nullable();
            $table->string('nickname')->nullable();
            $table->string('tel')->unique()->nullable();
            $table->string('hobby', 500)->nullable();
            $table->string('work', 500)->nullable();
            $table->string('skill', 500)->nullable();
            $table->string('target', 500)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
