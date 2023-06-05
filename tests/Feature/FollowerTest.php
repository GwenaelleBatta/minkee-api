<?php

use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it(' It is possible for a user to add/remove another user to their subscription ?', function () {

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

    actingAs($user)
       ->post('/api/user/' . $user->slug . '/followers/' . $user2->id, [
            'followed_id' => $user2->id,
            'follower_id' => $user->id,])
        ->assertStatus(200);
});

