<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/favorite.json");
        $favorite = json_decode($json);

        foreach ($favorite as $key => $value) {
            DB::table('favorite')->insert([
                "plan_id" => $value->plan_id,
                "user_id" => $value->user_id
            ]);
        }
    }
}
