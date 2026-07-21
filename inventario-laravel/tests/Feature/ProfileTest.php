<?php

use App\Models\User;

test('Profile page is displayed', function(){
    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->get('/profile');

    $response->assertOK();
});

test('Profile information can be updated', function(){
    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->patch('/profile',[
        'name' => 'Test User',
        'email' => 'test@example.com'
    ]);

    $response
    ->assertSessionHasNoErrors()
    ->assertRedirect('/profile');

    $user -> refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
});


test('email verification status is unchaged when the email address is not changed', function(){
    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->patch('/profile',[
        'name' => 'Test User',
        'email' => 'test@example.com'
    ]);

    $response
    ->assertSessionHasNoErrors()
    ->assertRedirect('/profile');


    $user -> refresh();

    $this->assertNull($user->refresh()->email_verified_at);
});



test('user can delete their account', function(){
    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->patch('/profile',[
        'password' => 'password',
    ]);

    $response
    ->assertSessionHasNoErrors()
    ->assertRedirect('/');



    $this->assertGuest();
    $this->assertNull($user->fresh());
});

test('correct password must be provided to delete account', function(){
    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->from('/profile')
    ->patch('/profile',[
        'password' => 'wrong-password',
    ]);

    $response
    ->assertSessionHasNoErrors('userDeletion','password')
    ->assertRedirect('/profile');

    $user -> refresh();

    $this->assertNotNull($user->fresh());
});
