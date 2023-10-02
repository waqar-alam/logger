<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogLevelsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('log_levels')) {
            Schema::create('log_levels', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('log_levels');
    }
}

