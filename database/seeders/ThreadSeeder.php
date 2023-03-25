<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/threads.json");
        $threads = json_decode($json);

        foreach ($threads as $key => $value) {
            Thread::factory()->create([
                "name" => $value->name,
                "category" => $value->category,
                "tint" => $value->tint,
                "number" => $value->number,
                "slug" => Str::slug($value->name.$value->number),
            ]);
        }
    }
}
