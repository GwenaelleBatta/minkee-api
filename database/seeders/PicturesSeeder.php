<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/pictures.json");
        $questions = json_decode($json);

        foreach ($questions as $key => $value) {
            Picture::factory()->create([
                "link" => $value->name,
                "user_id" => $value->user_id,
            ]);
        }
    }
}
