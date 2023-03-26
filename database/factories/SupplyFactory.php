<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supply>
 */
class SupplyFactory extends Factory
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
            "quantity" => "1",
            "color" => "",
            "tint" => "",
            "number" => "",
            "width" => "",
            "pictures" => "",
            "category" => "",
            "user_id" => 1,
            "typesupply_id" => 1
        ];
    }
}
