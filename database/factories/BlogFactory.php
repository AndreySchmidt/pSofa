<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'subject' => ucfirst(fake()->words(mt_rand(1, 2), true)),
            'subject' => fake()->sentence(mt_rand(7, 12), true),
            'description' => fake()->sentence(mt_rand(50, 60), true),
        ];
    }
}
