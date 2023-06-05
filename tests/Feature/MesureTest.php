<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('is possible for a user to create a measure ?', function () {
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';

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
    $nameMeasure = 'Test' ;
    $gender = 'femme' ;
    $outline = [];
    $lenght = [];

    $response = $this->post('/api/'. $user->slug.'/mesures/create', ['name' => $name, 'gender' => $gender, 'lenght' => $lenght, 'outline'=>$outline]);
    $response->assertStatus(200);

});

it('is possible for a user to modify a measure ?', function () {
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';

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
    $nameMeasure = 'Test' ;
    $gender = 'femme' ;
    $outline = [];
    $lenght = [];
    $measure = \App\Models\Mesure::create([
        'name' => $nameMeasure,
        'slug' => Str::slug($nameMeasure),
        'gender' => $gender,
        'outline' => json_encode($outline),
        'lenght' => json_encode($lenght),
        'user_id' => $user->id,
    ]);
$new_name = 'Test Mesure';
    $response = $this->post('/api/'. $user->slug.'/mesures/update/'. $measure->id, ['name' => $new_name, 'gender' => $gender, 'lenght' => $lenght, 'outline'=>$outline]);
    $response->assertStatus(200);
});

it('is possible for a user to delete a measure ?', function () {

    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';
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
    $nameMeasure = 'Test' ;
    $gender = 'femme' ;
    $outline = [];
    $lenght = [];
    $measure = \App\Models\Mesure::create([
        'name' => $nameMeasure,
        'slug' => Str::slug($nameMeasure),
        'gender' => $gender,
        'outline' => json_encode($outline),
        'lenght' => json_encode($lenght),
        'user_id' => $user->id,
    ]);
    $response = $this->delete('/api/'. $user->slug.'/mesures/destroy/'. $measure->id);
    $response->assertStatus(200);
});

