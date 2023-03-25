<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/levels.json");
        $levels = json_decode($json);

        foreach ($levels as $key => $value) {
            Level::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name),
            ]);
        }
    }
}
