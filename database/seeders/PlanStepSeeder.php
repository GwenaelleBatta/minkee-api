<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PlanStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/plan_step.json");
        $plans = json_decode($json);

        foreach ($plans as $key => $value) {
            DB::table('plan_step')->insert([
                "precision" => $value->precision,
                "order" => $value->order,
                "plan_id" => $value->plan_id,
                "step_id" => $value->step_id
            ]);
        }
    }
}
