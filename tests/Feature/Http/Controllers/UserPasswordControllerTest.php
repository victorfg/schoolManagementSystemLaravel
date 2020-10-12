<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserPasswordController
 */
class UserPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function edit_displays_view()
    {
        $userPassword = UserPassword::factory()->create();

        $response = $this->get(route('user-password.edit', $userPassword));

        $response->assertOk();
        $response->assertViewIs('userPassword.edit');
        $response->assertViewHas('user');
    }


    /**
     * @test
     */
    public function update_redirects()
    {
        $userPassword = UserPassword::factory()->create();

        $response = $this->put(route('user-password.update', $userPassword));

        $userPassword->refresh();

        $response->assertRedirect(route('home.index'));
        $response->assertSessionHas('user.id', $user->id);
    }
}
