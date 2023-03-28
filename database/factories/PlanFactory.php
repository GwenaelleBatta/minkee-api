<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlanFactory extends Factory
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
                "base" => "40",
                "slug" => Str::slug($content),
                "cut" => null,
                "gender" => 'femme',
                "price" => '60',
                "type" => "veste",
                "images" => [],
                "supplies" => [],
                "keywords" => [],
            "user_id" => 1,
            "level_id" => 1
        ];
    }
}
