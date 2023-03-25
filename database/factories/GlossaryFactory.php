<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Glossary>
 */
class GlossaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $content = fake()->sentence(40);
        return [
            "name" => $content,
            "slug" => Str::slug($content),
            "description" => fake()->sentence(100),
        ];
    }
}
