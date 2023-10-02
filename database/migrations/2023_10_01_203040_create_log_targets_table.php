<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTargetsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('log_targets')) {
            Schema::create('log_targets', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('log_targets');
    }
}
