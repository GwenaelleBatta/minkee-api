<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/save/users.json");
        $levels = json_decode($json);
        foreach ($levels as $key => $value) {
            User::factory()->create([
                "name" => $value->name,
                "slug" => Str::slug($value->name),
                "description" => $value->description,
                "avatar" => $value->avatar,
                "email" => $value->email,
                "connected" => $value->connected?? true,
                "password" => $value->password,
            ]);
        }
    }
}
