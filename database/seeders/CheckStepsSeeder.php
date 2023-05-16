<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CheckStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/checksteps.json");
        $check = json_decode($json);

        foreach ($check as $key => $value) {
            DB::table('checksteps')->insert([
                "planstep_id" => $value->planstep_id,
                "user_id" => $value->user_id
            ]);
        }
    }
}
