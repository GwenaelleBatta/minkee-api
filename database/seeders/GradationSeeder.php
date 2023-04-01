<?php

namespace Database\Seeders;

use App\Models\Glossary;
use App\Models\Gradation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GradationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/gradations.json");
        $gradations = json_decode($json);

        foreach ($gradations as $key => $value) {
            Gradation::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name),
                "base" => $value->base,
                "min" => $value->min,
                "max" => $value->max,
                "image" => $value->image,
                "variation" => json_encode($value->variation),
            ]);
        }
    }
}
