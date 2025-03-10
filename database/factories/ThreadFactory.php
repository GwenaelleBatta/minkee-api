<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = 'Fil Gütermann';
        $number = '000';
        return [
            "name" => $content,
            "category"=>'noir',
            "slug" => Str::slug($content.$number),
            "number"=> $number,
            "tint"=>'#000000'
        ];
    }
}
