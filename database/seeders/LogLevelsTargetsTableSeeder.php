<?php

// database/seeders/LogLevelsTargetsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogLevel;
use App\Models\LogTarget;

class LogLevelsTargetsTableSeeder extends Seeder
{
    public function run()
    {
        LogLevel::all()->each(function ($logLevel) {
            $logLevel->levelTargets()->attach(
                LogTarget::inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}

