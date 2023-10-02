<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LogLevelsTableSeeder;
use Database\Seeders\LogTargetsTableSeeder;
use Database\Seeders\LogLevelsTargetsTableSeeder;
use Database\Seeders\LogsTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LogLevelsTableSeeder::class,
            LogTargetsTableSeeder::class,
            LogLevelsTargetsTableSeeder::class,
            LogsTableSeeder::class,
        ]);
    }
}

