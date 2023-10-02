<?php

use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    protected $model = Log::class;

    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            'log_level_id' => LogLevel::factory(),
            'log_target_id' => LogTarget::factory(),
        ];
    }
}

