<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(LevelSeeder::class);
        $this->call(GlossarySeeder::class);
        $this->call(GradationSeeder::class);
        $this->call(ThreadSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MesureSeeder::class);
        $this->call(FabricSeeder::class);
        $this->call(TypeSupplySeeder::class);
        $this->call(SupplySeeder::class);
        $this->call(StepsSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(PlanStepSeeder::class);
    }
}
