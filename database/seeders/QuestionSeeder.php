<?php

namespace Database\Seeders;

use App\Models\Fabric;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/questions.json");
        $questions = json_decode($json);

        foreach ($questions as $key => $value) {
            Question::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name),
                "redirect" => $value->redirect,
            ]);
        }
    }
}
