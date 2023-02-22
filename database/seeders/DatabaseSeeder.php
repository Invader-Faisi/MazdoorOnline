<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Employer::factory()->create([
            [
                'name' => fake()->name(),
                'email' =>'emp1@gmail.com',
                'address' => fake()->address(),
                'contact' => fake()->phoneNumber(),
                'password' => '12345',
            ],
            [
                'name' => fake()->name(),
                'email' => 'emp2@gmail.com',
                'address' => fake()->address(),
                'contact' => fake()->phoneNumber(),
                'password' => '12345',
            ],
            [
                'name' => fake()->name(),
                'email' => 'emp3@gmail.com',
                'address' => fake()->address(),
                'contact' => fake()->phoneNumber(),
                'password' => '12345',
            ],
        ],Employer);
        \App\Models\Labour::factory()->create([
            [
                'name' => fake()->name(),
                'email' =>'labour1@gmail.com',
                'address' => fake()->address(),
                'contact' => fake()->phoneNumber(),
                'password' => '12345',
            ],
            [
                'name' => fake()->name(),
                'email' => 'labour2@gmail.com',
                'address' => fake()->address(),
                'contact' => fake()->phoneNumber(),
                'password' => '12345',
            ],
            [
                'name' => fake()->name(),
                'email' => 'labour3@gmail.com',
                'address' => fake()->address(),
                'contact' => fake()->phoneNumber(),
                'password' => '12345',
            ],
        ],Labour);

        \App\Models\Employer::create([

            'name' => fake()->name(),
            'email' => 'emp1@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),
        ]);
        \App\Models\Employer::create([

            'name' => fake()->name(),
            'email' => 'emp2@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),
        ]);
        \App\Models\Employer::create([

            'name' => fake()->name(),
            'email' => 'emp3@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),
        ]);
        \App\Models\Labour::create([
            'name' => fake()->name(),
            'email' => 'labour1@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),
        ]);
        \App\Models\Labour::create([
            'name' => fake()->name(),
            'email' => 'labour2@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),
        ]);
        \App\Models\Labour::create([
            'name' => fake()->name(),
            'email' => 'labour3@gmail.com',
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'password' => md5('12345'),
        ]);

        \App\Models\Job::factory(10)->create();
        \App\Models\Portfolio::factory(3)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}