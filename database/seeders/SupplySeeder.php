<?php

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/supplies.json");
        $supplies = json_decode($json);

        foreach ($supplies as $key => $value) {
            Supply::factory()->create([
                "name" => $value->name,
                "category" => $value->category,
                "quantity" => $value->quantity,
                "color" => $value->color,
                "tint" => $value->tint,
                "number" => $value->number,
                "width" => $value->width,
                "pictures" => $value->pictures,
                "slug" => Str::slug($value->name),
                "user_id" => $value->user_id,
                "typesupply_id" => $value->typesupply_id
            ]);
        }
    }
}
