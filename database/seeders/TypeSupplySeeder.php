<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\TypeSupply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TypeSupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/typesupplies.json");
        $types = json_decode($json);

        foreach ($types as $key => $value) {
            TypeSupply::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name.$value->number),
            ]);
        }
    }
}
