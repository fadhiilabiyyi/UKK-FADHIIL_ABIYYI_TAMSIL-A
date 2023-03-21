<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Officer>
 */
class OfficerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level = ['officer', 'admin'];
        return [
            'nik' => fake()->nik(),
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'slug' => fake()->unique()->userName(),
            'password' => Hash::make('password'),
            'email' => fake()->unique()->email(),
            'telp' => fake()->unique()->phoneNumber(),
            'level' => fake()->randomElement(['officer', 'admin']),
        ];
    }
}
