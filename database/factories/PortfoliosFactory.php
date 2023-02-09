<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Portfolios>
 */
class PortfoliosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'experience' => fake()->number_format(2,10),
            'skills' => fake()->slug(),
            'hourly_rate' => fake()->number_format(50,100),
            'labour_id' => fake()->number_format(1,10),
        ];
    }
}
