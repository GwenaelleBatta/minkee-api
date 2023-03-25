<?php

namespace Database\Seeders;

use App\Models\Mesure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MesureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/mesures.json");
        $mesures = json_decode($json);

        foreach ($mesures as $key => $value) {
            Mesure::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name),
                "lenght" => json_encode($value->lenght),
                "outline" => json_encode($value->outline),
                "user_id"=>$value->user_id
            ]);
        }
    }
}
