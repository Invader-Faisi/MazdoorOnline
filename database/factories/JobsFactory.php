<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'location' => fake()->number_format(2,10),
            'rate' => fake()->slug(),
            'hourly_rate' => fake()->number_format(50,100),
            'labour_id' => fake()->number_format(1,10),
        ];
    }
}
