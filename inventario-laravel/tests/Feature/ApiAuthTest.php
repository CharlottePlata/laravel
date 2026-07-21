<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('allows users to login and access protected route', function ()
{
    $user = User::factory()->create([
        'email'=> 'api@example.com',
        'password'=> Hash::make('password'),
    ]);

    $loginResponse = $this->postJson('api/login',[
        'email'=> $user->email,
        'password' => 'password123'
    ]);



    $loginResponse->assertStatus(200)
    ->assertJsonStructure([
        'token', 'token_type', 'expires_in', 'user'])
    ->assertJsonPath('user.email', $user->email);

    $token = $loginResponse ->json('token');

    $this->withHeader('Authorization', 'Bearer'. $token)
    ->getJson('api/user')
    ->assertStatus(200)
    ->assertJsonPath('email', $user->email);


});