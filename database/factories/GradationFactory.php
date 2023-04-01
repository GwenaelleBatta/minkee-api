<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gradation>
 */
class GradationFactory extends Factory
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
            "image" => "",
            "base" => 40,
            "min" => 36,
            "max" => 46,
            "variation" => [],
        ];
    }
}
