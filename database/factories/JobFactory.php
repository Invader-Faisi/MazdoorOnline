<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Jobs>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category' => "Individual",
            'title' => fake()->name(),
            'location' => fake()->city(),
            'rate' => 'BId',
            'description' => fake()->sentence(),
            'job_rate' => fake()->numberBetween(100, 500),
            'employer_id' => fake()->numberBetween(1, 3),
        ];
    }
}