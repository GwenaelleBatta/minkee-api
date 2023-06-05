<?php

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('is possible for a user to create a account ?', function () {
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
    $email = 'titi@gmail.com';
    $password = 'azerty123';

    $response = $this->post('/api/register', [
        'name' => $name,
        'email' => $email,
        'email_verified_at' => now(),
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'remember_token' => Str::random(10),
        'api_token' => Str::random(52),
        "slug" => Str::slug($name),
        "avatar" => 'https://placehold.jp/276x276.png',
        "connected" => 1,
    ]);
    $response->assertStatus(200);

});

it('is possible for an user to log in ?', function () {
    $name = 'Titi';
    $email = 'titi@gmail.com';
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
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

    $response = $this->post('/api/login', ['email' => $email, 'password' => $password]);
    $response->assertStatus(200);
});

it('is possible for an user to edit his profil ?', function () {

    $name = 'Titi';
    $email = 'titi@gmail.com';
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
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
    $new_name = 'Toto';

    actingAs($user)
        ->post('/api/user/update/'.$user->id, ['name' => $new_name, 'firstname' => $user->firstname, 'status_id' => $user->status_id, 'email' => $user->email])
        ->assertStatus(200);
});

it('is possible for a user to disconnect ?', function () {

    $name = 'Titi';
    $email = 'titi@gmail.com';
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
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
    $new_name = 'Toto';

    actingAs($user)
        ->post('/api/logout/'.$user->slug, ['name' => $new_name, 'firstname' => $user->firstname, 'status_id' => $user->status_id, 'email' => $user->email])
        ->assertStatus(200);
});
it(' is possible for a user to delete his account ?', function () {

    $name = 'Titi';
    $email = 'titi@gmail.com';
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
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

    actingAs($user)
        ->delete('/api/user/destroy/'.$user->id)
        ->assertStatus(200);
});

it('is possible for an user to reset his password ?', function () {

    $name = 'Titi';
    $email = 'titi@gmail.com';
    $name = 'TitiTristan';
    $description = 'Je fais des tests';
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

    $response = $this->post('/api/user/password', ['email' => $email]);
    $response->assertStatus(200);

});
