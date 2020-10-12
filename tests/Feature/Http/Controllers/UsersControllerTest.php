<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UsersController
 */
class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $users = Users::factory()->count(3)->create();

        $response = $this->get(route('user.index'));

        $response->assertOk();
        $response->assertViewIs('user.index');
        $response->assertViewHas('users');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('user.create'));

        $response->assertOk();
        $response->assertViewIs('user.create');
    }


    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('user.store'));

        $response->assertRedirect(route('user.show', ['user' => $user]));

        $this->assertDatabaseHas(users, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $user = Users::factory()->create();

        $response = $this->get(route('user.show', $user));

        $response->assertOk();
        $response->assertViewIs('user.show');
    }


    /**
     * @test
     */
    public function update_displays_view()
    {
        $user = Users::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('user.update', $user));

        $response->assertOk();
        $response->assertViewIs('user.destroy');
        $response->assertViewHas('user');
    }


    /**
     * @test
     */
    public function delete_displays_view()
    {
        $user = User::factory()->create();

        $response = $this->get(route('user.delete'));

        $response->assertOk();
        $response->assertViewIs('user.destroy');
        $response->assertViewHas('user');
    }
}
