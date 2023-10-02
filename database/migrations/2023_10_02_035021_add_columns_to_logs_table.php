<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLogsTable extends Migration
{
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {

            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('target_id');

            $table->foreign('level_id')->references('id')->on('log_levels');
            $table->foreign('target_id')->references('id')->on('log_targets');
        });
    }

    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            
            $table->dropForeign(['level_id']);
            $table->dropForeign(['target_id']);
        });
    }
}



