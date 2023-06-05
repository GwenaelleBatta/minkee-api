<?php

use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it(' It is possible for a user to add/remove a production plan as a favorite ?', function () {


    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $email2 = 'toto@gmail.com';
    $password = 'azerty123';
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\LevelSeeder::class]);
    $this->seed([\Database\Seeders\StepsSeeder::class]);
    $user = User::create([
        'name' => $name,
        'email' => $email,
        'description' => $description,
        'email_verified_at' => now(),
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'remember_token' => Str::random(10),
        'api_token' => Str::random(52),
        "slug" => Str::slug($name),
        "avatar" => 'https://placehold.jp/276x276.png',
        "connected" => 1,
    ]);
    $user2 = User::create([
        'name' => $name.'2',
        'email' => $email2,
        'description' => $description,
        'email_verified_at' => now(),
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'remember_token' => Str::random(10),
        'api_token' => Str::random(52),
        "slug" => Str::slug($name.'2'),
        "avatar" => 'https://placehold.jp/276x276.png',
        "connected" => 1,
    ]);
    $namePlans = 'Test';
    $base = 40;
    $cut = null;
    $gender = 'femme';
    $images = null;
    $price = 20;
    $type = 'test';
    $keywords = json_encode('coucou');
    $supplies = json_encode('coucou');
    $steps = json_encode([['plan_id' => 1, 'order' => 1, 'precision' => 'coucou', 'step_id' => 1]]);
    $level_id = 1;

    $plan = Plan::create([
        'name' => $namePlans,
        'level_id' => $level_id,
        'user_id' => $user2->id,
        'slug' => Str::slug($namePlans),
        'gender' => $gender,
        'base' => $base,
        'cut' => $cut,
        'images' => $images,
        'price' => $price,
        'type' => $type,
        'keywords' => $keywords,
        'step' => $steps,
        'supplies' => $supplies]);

    actingAs($user)
       ->post('/api/' . $user->slug . '/plans/favorite/' . $plan->id, [
            'plan_id' => $plan->id,
            'user_id' => $user->id,])
        ->assertStatus(200);
});

