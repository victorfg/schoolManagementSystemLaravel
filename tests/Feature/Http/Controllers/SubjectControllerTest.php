<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewSubject;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SubjectController
 */
class SubjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $subjects = Subject::factory()->count(3)->create();

        $response = $this->get(route('subject.index'));

        $response->assertOk();
        $response->assertViewIs('subject.index');
        $response->assertViewHas('subjects');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('subject.create'));

        $response->assertOk();
        $response->assertViewIs('subject.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubjectController::class,
            'store',
            \App\Http\Requests\SubjectStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $user = User::factory()->create();
        $name = $this->faker->name;
        $color = $this->faker->word;

        Event::fake();

        $response = $this->post(route('subject.store'), [
            'user_id' => $user->id,
            'name' => $name,
            'color' => $color,
        ]);

        $subjects = Subject::query()
            ->where('user_id', $user->id)
            ->where('name', $name)
            ->where('color', $color)
            ->get();
        $this->assertCount(1, $subjects);
        $subject = $subjects->first();

        $response->assertRedirect(route('subject.index'));
        $response->assertSessionHas('subject.name', $subject->name);

        Event::assertDispatched(NewSubject::class, function ($event) use ($subject) {
            return $event->subject->is($subject);
        });
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $subject = Subject::factory()->create();
        $subjects = Subject::factory()->count(3)->create();

        $response = $this->get(route('subject.show', $subject));

        $response->assertOk();
        $response->assertViewIs('subject.show');
        $response->assertViewHas('subject');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $subject = Subject::factory()->create();

        $response = $this->get(route('subject.edit', $subject));

        $response->assertOk();
        $response->assertViewIs('subject.edit');
        $response->assertViewHas('subject');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubjectController::class,
            'update',
            \App\Http\Requests\SubjectUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $subject = Subject::factory()->create();
        $user = User::factory()->create();
        $name = $this->faker->name;
        $color = $this->faker->word;

        $response = $this->put(route('subject.update', $subject), [
            'user_id' => $user->id,
            'name' => $name,
            'color' => $color,
        ]);

        $subject->refresh();

        $response->assertRedirect(route('subject.index'));
        $response->assertSessionHas('subject.id', $subject->id);

        $this->assertEquals($user->id, $subject->user_id);
        $this->assertEquals($name, $subject->name);
        $this->assertEquals($color, $subject->color);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $subject = Subject::factory()->create();

        $response = $this->delete(route('subject.destroy', $subject));

        $response->assertRedirect(route('subject.index'));

        $this->assertDeleted($subject);
    }
}
