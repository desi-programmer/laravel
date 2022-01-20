<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('completed')->default(0);
            $table->char('title', 100);
            $table->mediumText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas_models');
    }
}
