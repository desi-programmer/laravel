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
            $table->tinyText('username');
            $table->tinyText('instagram');
            $table->tinyText('facebook');
            $table->tinyText('twitter');
            $table->tinyText('youtube');
            $table->tinyText('reddit');
            $table->tinyText('behance');
            $table->tinyText('github');
            $table->tinyText('gitlab');
            $table->tinyText('whatsapp');
            $table->tinyText('tagline');
            $table->tinyText('image');
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
