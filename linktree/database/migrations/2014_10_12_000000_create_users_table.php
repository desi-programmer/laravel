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
            $table->rememberToken();
            $table->timestamps();
            $table->tinyText('username')->nullable();
            $table->tinyText('instagram')->nullable();
            $table->tinyText('facebook')->nullable();
            $table->tinyText('twitter')->nullable();;
            $table->tinyText('youtube')->nullable();;
            $table->tinyText('reddit')->nullable();;
            $table->tinyText('behance')->nullable();;
            $table->tinyText('github')->nullable();;
            $table->tinyText('gitlab')->nullable();;
            $table->tinyText('whatsapp')->nullable();;
            $table->tinyText('tagline')->nullable();;
            $table->tinyText('image')->nullable();;
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
