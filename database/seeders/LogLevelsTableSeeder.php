<?php

// database/seeders/LogLevelsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LogLevel;
use Database\Factories\LogLevelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogLevelsTableSeeder extends Seeder
{
    use HasFactory;

    public function run()
    {
        LogLevel::create(
            [
                'name' => 'Error'
            ]
        );
    }
}

