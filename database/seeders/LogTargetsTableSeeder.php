<?php

// database/seeders/LogTargetsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogTarget;
use Database\Factories\LogTargetFactory;

class LogTargetsTableSeeder extends Seeder
{
    public function run()
    {
        LogTarget::factory()
            ->count(10) // Adjust the number of entries you want to seed
            ->create();
    }
}

