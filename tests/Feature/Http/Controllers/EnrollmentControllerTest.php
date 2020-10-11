<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewEnrollment;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EnrollmentController
 */
class EnrollmentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $enrollments = Enrollment::factory()->count(3)->create();

        $response = $this->get(route('enrollment.index'));

        $response->assertOk();
        $response->assertViewIs('enrollment.index');
        $response->assertViewHas('enrollments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('enrollment.create'));

        $response->assertOk();
        $response->assertViewIs('enrollment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EnrollmentController::class,
            'store',
            \App\Http\Requests\EnrollmentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $course = Course::factory()->create();
        $user = User::factory()->create();
        $status = $this->faker->numberBetween(-10000, 10000);
        $active = $this->faker->boolean;

        Event::fake();

        $response = $this->post(route('enrollment.store'), [
            'course_id' => $course->id,
            'user_id' => $user->id,
            'status' => $status,
            'active' => $active,
        ]);

        $enrollments = Enrollment::query()
            ->where('course_id', $course->id)
            ->where('user_id', $user->id)
            ->where('status', $status)
            ->where('active', $active)
            ->get();
        $this->assertCount(1, $enrollments);
        $enrollment = $enrollments->first();

        $response->assertRedirect(route('enrollment.index'));
        $response->assertSessionHas('enrollment.name', $enrollment->name);

        Event::assertDispatched(NewEnrollment::class, function ($event) use ($enrollment) {
            return $event->enrollment->is($enrollment);
        });
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $enrollment = Enrollment::factory()->create();
        $enrollments = Enrollment::factory()->count(3)->create();

        $response = $this->get(route('enrollment.show', $enrollment));

        $response->assertOk();
        $response->assertViewIs('enrollment.show');
        $response->assertViewHas('enrollment');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $enrollment = Enrollment::factory()->create();

        $response = $this->get(route('enrollment.edit', $enrollment));

        $response->assertOk();
        $response->assertViewIs('enrollment.edit');
        $response->assertViewHas('enrollment');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EnrollmentController::class,
            'update',
            \App\Http\Requests\EnrollmentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $enrollment = Enrollment::factory()->create();
        $course = Course::factory()->create();
        $user = User::factory()->create();
        $status = $this->faker->numberBetween(-10000, 10000);
        $active = $this->faker->boolean;

        $response = $this->put(route('enrollment.update', $enrollment), [
            'course_id' => $course->id,
            'user_id' => $user->id,
            'status' => $status,
            'active' => $active,
        ]);

        $enrollment->refresh();

        $response->assertRedirect(route('enrollment.index'));
        $response->assertSessionHas('enrollment.id', $enrollment->id);

        $this->assertEquals($course->id, $enrollment->course_id);
        $this->assertEquals($user->id, $enrollment->user_id);
        $this->assertEquals($status, $enrollment->status);
        $this->assertEquals($active, $enrollment->active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $enrollment = Enrollment::factory()->create();

        $response = $this->delete(route('enrollment.destroy', $enrollment));

        $response->assertRedirect(route('enrollment.index'));

        $this->assertDeleted($enrollment);
    }
}
