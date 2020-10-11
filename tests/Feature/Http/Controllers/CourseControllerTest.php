<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewCourse;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CourseController
 */
class CourseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $courses = Course::factory()->count(3)->create();

        $response = $this->get(route('course.index'));

        $response->assertOk();
        $response->assertViewIs('course.index');
        $response->assertViewHas('courses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('course.create'));

        $response->assertOk();
        $response->assertViewIs('course.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseController::class,
            'store',
            \App\Http\Requests\CourseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $date_start = $this->faker->dateTime();
        $date_end = $this->faker->dateTime();
        $active = $this->faker->boolean;

        Event::fake();

        $response = $this->post(route('course.store'), [
            'name' => $name,
            'description' => $description,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'active' => $active,
        ]);

        $courses = Course::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('date_start', $date_start)
            ->where('date_end', $date_end)
            ->where('active', $active)
            ->get();
        $this->assertCount(1, $courses);
        $course = $courses->first();

        $response->assertRedirect(route('course.index'));
        $response->assertSessionHas('course.name', $course->name);

        Event::assertDispatched(NewCourse::class, function ($event) use ($course) {
            return $event->course->is($course);
        });
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $course = Course::factory()->create();
        $courses = Course::factory()->count(3)->create();

        $response = $this->get(route('course.show', $course));

        $response->assertOk();
        $response->assertViewIs('course.show');
        $response->assertViewHas('course');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $course = Course::factory()->create();

        $response = $this->get(route('course.edit', $course));

        $response->assertOk();
        $response->assertViewIs('course.edit');
        $response->assertViewHas('course');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseController::class,
            'update',
            \App\Http\Requests\CourseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $course = Course::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $date_start = $this->faker->dateTime();
        $date_end = $this->faker->dateTime();
        $active = $this->faker->boolean;

        $response = $this->put(route('course.update', $course), [
            'name' => $name,
            'description' => $description,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'active' => $active,
        ]);

        $course->refresh();

        $response->assertRedirect(route('course.index'));
        $response->assertSessionHas('course.id', $course->id);

        $this->assertEquals($name, $course->name);
        $this->assertEquals($description, $course->description);
        $this->assertEquals($date_start, $course->date_start);
        $this->assertEquals($date_end, $course->date_end);
        $this->assertEquals($active, $course->active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $course = Course::factory()->create();

        $response = $this->delete(route('course.destroy', $course));

        $response->assertRedirect(route('course.index'));

        $this->assertDeleted($course);
    }
}
