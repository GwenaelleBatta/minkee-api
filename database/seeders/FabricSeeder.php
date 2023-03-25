<?php

namespace Database\Seeders;

use App\Models\Fabric;
use App\Models\Mesure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FabricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/fabrics.json");
        $fabrics = json_decode($json);

        foreach ($fabrics as $key => $value) {
            Fabric::factory()->create([
                "name" => $value->name,
                "description" => $value->description,
                "image" => $value->image,
                "slug" => Str::slug($value->name),
                "use" => json_encode($value->use),
            ]);
        }
    }
}
