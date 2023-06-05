<?php

use App\Models\Supply;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('is possible for a user to create a supply ?', function () {
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\TypeSupplySeeder::class]);
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
    $nameSupply = 'Burda style mars 2017';
    $type = 1;
    $color = null;
    $number = null;
    $tint = null;
    $category = null;
    $width = null;
    $pictures = null;
    $quantity = 1;

    $response = $this->post('/api/' . $user->slug . '/supplies/create', ['name' => $nameSupply, 'typesupply_id' => $type,
        'color' => $color,
        'number' => $number,
        'tint' => $tint,
        'category' => $category,
        'width'=>$width,
        'pictures'=>$pictures,
        'quantity'=>$quantity ]);
    $response->assertStatus(200);

});

it('is possible for a user to modify a supply ?', function () {
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\TypeSupplySeeder::class]);
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
    $nameSupply = 'Burda style mars 2017';
    $type = 1;
    $color = null;
    $number = null;
    $tint = null;
    $category = null;
    $width = null;
    $pictures = null;
    $quantity = 1;

    $supply = Supply::create(['name' => $nameSupply, 'typesupply_id' => $type,
        'color' => $color,
        'number' => $number,
        'tint' => $tint,
        'category' => $category,
        'width'=>$width,
        'pictures'=>$pictures,
        'quantity'=>$quantity, 'user_id'=>$user->id ]);
    $new_name = 'Test Fournitures';

    $response = $this->post('/api/' . $user->slug . '/supplies/update/' . $supply->id, [
        'name' => $new_name,
        'typesupply_id' => $type,
        'color' => $color,
        'number' => $number,
        'tint' => $tint,
        'category' => $category,
        'width'=>$width,
        'pictures'=>$pictures,
        'quantity'=>$quantity ]);

    $response->assertStatus(200);
});

it('is possible for a user to delete a supply ?', function () {

    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\TypeSupplySeeder::class]);
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
    $nameSupply = 'Burda style mars 2017';
    $type = 1;
    $color = null;
    $number = null;
    $tint = null;
    $category = null;
    $width = null;
    $pictures = null;
    $quantity = 1;
    $supply = Supply::create(['name' => $nameSupply, 'typesupply_id' => $type,
        'color' => $color,
        'number' => $number,
        'tint' => $tint,
        'category' => $category,
        'width'=>$width,
        'pictures'=>$pictures,
        'quantity'=>$quantity, 'user_id'=>$user->id ]);

    $response = $this->delete('/api/' . $user->slug . '/supplies/destroy/' . $supply->id);
    $response->assertStatus(200);
});

