<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewSchedule;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ScheduleController
 */
class ScheduleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $schedules = Schedule::factory()->count(3)->create();

        $response = $this->get(route('schedule.index'));

        $response->assertOk();
        $response->assertViewIs('schedule.index');
        $response->assertViewHas('schedules');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('schedule.create'));

        $response->assertOk();
        $response->assertViewIs('schedule.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ScheduleController::class,
            'store',
            \App\Http\Requests\ScheduleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $course = Course::factory()->create();
        $subject = Subject::factory()->create();
        $time_start = $this->faker->dateTime();
        $time_end = $this->faker->dateTime();
        $active = $this->faker->boolean;

        Event::fake();

        $response = $this->post(route('schedule.store'), [
            'course_id' => $course->id,
            'subject_id' => $subject->id,
            'time_start' => $time_start,
            'time_end' => $time_end,
            'active' => $active,
        ]);

        $schedules = Schedule::query()
            ->where('course_id', $course->id)
            ->where('subject_id', $subject->id)
            ->where('time_start', $time_start)
            ->where('time_end', $time_end)
            ->where('active', $active)
            ->get();
        $this->assertCount(1, $schedules);
        $schedule = $schedules->first();

        $response->assertRedirect(route('schedule.index'));
        $response->assertSessionHas('schedule.name', $schedule->name);

        Event::assertDispatched(NewSchedule::class, function ($event) use ($schedule) {
            return $event->schedule->is($schedule);
        });
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $schedule = Schedule::factory()->create();
        $schedules = Schedule::factory()->count(3)->create();

        $response = $this->get(route('schedule.show', $schedule));

        $response->assertOk();
        $response->assertViewIs('schedule.show');
        $response->assertViewHas('schedule');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $schedule = Schedule::factory()->create();

        $response = $this->get(route('schedule.edit', $schedule));

        $response->assertOk();
        $response->assertViewIs('schedule.edit');
        $response->assertViewHas('schedule');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ScheduleController::class,
            'update',
            \App\Http\Requests\ScheduleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $schedule = Schedule::factory()->create();
        $course = Course::factory()->create();
        $subject = Subject::factory()->create();
        $time_start = $this->faker->dateTime();
        $time_end = $this->faker->dateTime();
        $active = $this->faker->boolean;

        $response = $this->put(route('schedule.update', $schedule), [
            'course_id' => $course->id,
            'subject_id' => $subject->id,
            'time_start' => $time_start,
            'time_end' => $time_end,
            'active' => $active,
        ]);

        $schedule->refresh();

        $response->assertRedirect(route('schedule.index'));
        $response->assertSessionHas('schedule.id', $schedule->id);

        $this->assertEquals($course->id, $schedule->course_id);
        $this->assertEquals($subject->id, $schedule->subject_id);
        $this->assertEquals($time_start, $schedule->time_start);
        $this->assertEquals($time_end, $schedule->time_end);
        $this->assertEquals($active, $schedule->active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $schedule = Schedule::factory()->create();

        $response = $this->delete(route('schedule.destroy', $schedule));

        $response->assertRedirect(route('schedule.index'));

        $this->assertDeleted($schedule);
    }
}
