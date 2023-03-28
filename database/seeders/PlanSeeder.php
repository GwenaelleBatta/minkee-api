<?php

namespace Database\Seeders;

use App\Models\Glossary;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/plans.json");
        $plans = json_decode($json);

        foreach ($plans as $key => $value) {
            Plan::factory()->create([
                "name" => $value->name,
                "base" => $value->base,
                "slug" => Str::slug($value->name),
                "cut" => $value->cut,
                "gender" => $value->gender,
                "price" => $value->price,
                "type" => $value->type,
                "images" => json_encode($value->images),
                "supplies" => json_encode($value->supplies),
                "keywords" => json_encode($value->keywords),
                "user_id" => $value->user_id,
                "level_id" => $value->level_id
            ]);
        }
    }
}
