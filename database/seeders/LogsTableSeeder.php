<?php

// database/seeders/LogsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;
use App\Models\LogLevel;
use App\Models\LogTarget;
use Database\Factories\LogFactory;

class LogsTableSeeder extends Seeder
{
    public function run()
    {
        Log::factory()
            ->count(50) // Adjust the number of entries you want to seed
            ->create([
                'log_level_id' => LogLevel::inRandomOrder()->first()->id,
                'log_target_id' => LogTarget::inRandomOrder()->first()->id,
            ]);
    }
}

