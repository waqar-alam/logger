<?php

use Illuminate\Database\Eloquent\Factories\Factory;

class LogTargetFactory extends Factory
{
    protected $model = LogTarget::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}

