<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLevelIdColumnInLogsTable extends Migration
{
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->renameColumn('level_id', 'log_level_id');
        });
    }

    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->renameColumn('log_level_id', 'level_id');
        });
    }
}