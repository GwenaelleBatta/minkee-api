<?php

namespace Database\Seeders;

use App\Models\Mesure;
use App\Models\Steps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/steps.json");
        $steps = json_decode($json);

        foreach ($steps as $key => $value) {
            Steps::factory()->create([
                "name" => $value->name,
                "image" => $value->image,
                "check" => $value->check,
                "description" => $value->description,
                "slug" => Str::slug($value->name),
            ]);
        }
    }
}
