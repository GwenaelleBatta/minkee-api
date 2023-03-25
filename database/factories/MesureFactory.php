<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mesure>
 */
class MesureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = 'Prénom';
        return [
            "name" => $content,
            "slug" => Str::slug($content),
            "outline"=> [],
            "lenght"=>[],
            "user_id"=>1
        ];
    }
}
