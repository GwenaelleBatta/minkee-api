<?php

namespace Database\Seeders;

use App\Models\Glossary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GlossarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/glossaries.json");
        $glossaries = json_decode($json);

        foreach ($glossaries as $key => $value) {
            Glossary::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name),
                "description" => $value->description,
            ]);
        }
    }
}
