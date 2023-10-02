<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogLevelConfigTable extends Migration
{
    public function up()
    {
        Schema::create('user_log_level_config', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('log_level_preference', ['Debug', 'Info', 'Warning', 'Error']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_log_level_config');
    }
}

