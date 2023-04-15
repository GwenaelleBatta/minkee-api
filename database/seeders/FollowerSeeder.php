<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/followers.json");
        $followers = json_decode($json);

        foreach ($followers as $key => $value) {
            DB::table('followers')->insert([
                "follower_id" => $value->follower_id,
                "followed_id" => $value->followed_id
            ]);
        }
    }
}
