<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $token = Str::random(60);
        return [
            'name' => $name,
            'slug'=> Str::slug($name),
            'api_token'=>  $token,
            'avatar' => '',
            'email' => fake()->unique()->safeEmail(),
            'connected'=> true,
            'email_verified_at' => now(),
            'password' => '$2y$10$Xp7QmfbM5rtEFxlUkpSr0usvL1TEnFM/uro2v0BcWfeaX6N8YCqIe', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
