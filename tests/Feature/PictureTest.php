<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('is possible for a user to create a picture ?', function () {
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
    \Illuminate\Support\Facades\Storage::fake('storage');

    $link = UploadedFile::createFromBase(
        new Symfony\Component\HttpFoundation\File\UploadedFile(
            storage_path('app/public/plans/images/90e3e45fa20ba3a90eb455c01f081659119fd135.jpg'),
            '90e3e45fa20ba3a90eb455c01f081659119fd135.jpg',
            mime_content_type(storage_path('app/public/plans/images/90e3e45fa20ba3a90eb455c01f081659119fd135.jpg')),
            null,
            true
        )
    );

    $response = $this->post('/api/'. $user->slug.'/pictures/create', ['link' => $link]);
    $response->assertStatus(200);

});

it('is possible for a user to delete a picture ?', function () {

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
    \Illuminate\Support\Facades\Storage::fake('public');

    $link = UploadedFile::createFromBase(
        new Symfony\Component\HttpFoundation\File\UploadedFile(
            storage_path('app/public/plans/images/90e3e45fa20ba3a90eb455c01f081659119fd135.jpg'),
            '90e3e45fa20ba3a90eb455c01f081659119fd135.jpg',
            mime_content_type(storage_path('app/public/plans/images/90e3e45fa20ba3a90eb455c01f081659119fd135.jpg')),
            null,
            true
        )
    );


    $picture = \App\Models\Picture::create([
        'link' => $link,
        'user_id' => $user->id,
    ]);
    $response = $this->delete('/api/'. $user->slug.'/pictures/destroy/'. $picture->id);
    $response->assertStatus(200);
});

