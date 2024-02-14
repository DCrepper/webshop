<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Livewire\Volt\Volt;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function testLoginScreenCanBeRendered()
    {
        $response = $this->get('/login')->assertSeeVolt('pages.auth.login');

        $response->assertOk();
    }

    public function testUsersCanAuthenticateUsingTheLoginScreen()
    {
        $user = User::factory(1)->create();
        $user = User::whereId($user[0]->id)->first();
        $this->actingAs($user);

        $component = Volt::test('pages.auth.login')
            ->set('form.email', $user->email)
            ->set('form.password', 'password');

        $component->call('login');

        $component
            ->assertHasNoErrors()
            ->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticated();

    }

    public function testUsersCannotAuthenticateWithInvalidPassword()
    {
        $user = User::factory(1)->create();
        $user = User::whereId($user[0]->id)->first();

        $component = Volt::test('pages.auth.login')
            ->set('form.email', $user->email)
            ->set('form.password', 'wrong-password');

        $component->call('login');

        $component
            ->assertHasErrors()
            ->assertNoRedirect();

        $this->assertGuest();

    }

    public function testNavigationMenuCanBeRendered()
    {
        $user = User::factory(1)->create();
        $user = User::whereId($user[0]->id)->first();
        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response
            ->assertOk()
            ->assertSeeVolt('layout.navigation');

    }

    public function testUsersCanLogout()
    {
        $user = User::factory(1)->create();
        $user = User::whereId($user[0]->id)->first();
        $this->actingAs($user);

        $component = Volt::test('layout.navigation');

        $component->call('logout');

        $component
            ->assertHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();

    }
}
