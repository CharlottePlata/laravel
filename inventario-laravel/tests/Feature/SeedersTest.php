<?php

use Database\Seeders\DatabaseSeeder;

uses (test\TestCase::class, Illuminate\Foundation\Testing\RefreshDatabase::class);

it('create the default admin and user accounts', function (){
    $this->artisan('db:seed', ['--class' => DatabaseSeeder::class]);

    $this->assertDatabaseHas('users', [
        'email' => 'admin@example.com',
        'role' => 'admin',
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'coordinator@example.com',
        'role' => 'coordinator',
    ]);
});