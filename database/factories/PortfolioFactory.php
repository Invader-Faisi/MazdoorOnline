<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Portfolios>
 */
class PortfolioFactory extends Factory
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
            'experience' => fake()->numberBetween(2, 10),
            'skills' => fake()->slug(),
            'hourly_rate' => fake()->numberBetween(50, 100),
            'labour_id' => fake()->numberBetween(1, 3),
        ];
    }
}