<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Labour>
 */
class LabourFactory extends Factory
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
            'email' => 'labour1@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),

        ];
    }
}