<?php

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

it('is possible to display the list of words in the glossary', function () {
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\GlossarySeeder::class]);
    $response = $this->get('/api/glossaries');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
                'slug',
                'description',
                'created_at',
                'updated_at',
            ],
        ],
    ]);
});

it('is possible to display the list of fabrics', function () {
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\FabricSeeder::class]);
    $response = $this->get('/api/fabrics');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
                'slug',
                'description',
                'use',
                'created_at',
                'updated_at',
            ],
        ],
    ]);
});

it('is possible to display the list of gradations', function () {
    $this->artisan('migrate:fresh');
    $this->seed([\Database\Seeders\GradationSeeder::class]);
    $response = $this->get('/api/gradations');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
                'slug',
                'base',
                'min',
                'max',
                'image',
                'variation',
                'created_at',
                'updated_at',
            ],
        ],
    ]);
});
