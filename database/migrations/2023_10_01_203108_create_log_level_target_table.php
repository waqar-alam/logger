<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogLevelTargetTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('log_level_target')) {
            Schema::create('log_level_target', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('log_level_id');
                $table->unsignedBigInteger('log_target_id');
                $table->timestamps();

                $table->foreign('log_level_id')->references('id')->on('log_levels');
                $table->foreign('log_target_id')->references('id')->on('log_targets');

                // Composite index for the 'log_level_id' and 'log_target_id' columns
                $table->unique(['log_level_id', 'log_target_id']);
            });
        }
    }

    public function down()
    {
        Schema::table('log_level_target', function (Blueprint $table) {
            $table->dropForeign(['log_level_id']);
            $table->dropForeign(['log_target_id']);
        });

        Schema::dropIfExists('log_level_target');
    }
}

