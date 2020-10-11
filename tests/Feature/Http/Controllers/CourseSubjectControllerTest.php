<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\NewCourseSubject;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CourseSubjectController
 */
class CourseSubjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $courseSubjects = CourseSubject::factory()->count(3)->create();

        $response = $this->get(route('course-subject.index'));

        $response->assertOk();
        $response->assertViewIs('courseSubject.index');
        $response->assertViewHas('courseSubjects');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('course-subject.create'));

        $response->assertOk();
        $response->assertViewIs('courseSubject.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseSubjectController::class,
            'store',
            \App\Http\Requests\CourseSubjectStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $course = Course::factory()->create();
        $subject = Subject::factory()->create();

        Event::fake();

        $response = $this->post(route('course-subject.store'), [
            'course_id' => $course->id,
            'subject_id' => $subject->id,
        ]);

        $courseSubjects = CourseSubject::query()
            ->where('course_id', $course->id)
            ->where('subject_id', $subject->id)
            ->get();
        $this->assertCount(1, $courseSubjects);
        $courseSubject = $courseSubjects->first();

        $response->assertRedirect(route('course-subject.index'));
        $response->assertSessionHas('courseSubject.id', $courseSubject->id);

        Event::assertDispatched(NewCourseSubject::class, function ($event) use ($courseSubject) {
            return $event->courseSubject->is($courseSubject);
        });
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $courseSubject = CourseSubject::factory()->create();
        $courseSubjects = CourseSubject::factory()->count(3)->create();

        $response = $this->get(route('course-subject.show', $courseSubject));

        $response->assertOk();
        $response->assertViewIs('courseSubject.show');
        $response->assertViewHas('courseSubject');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $courseSubject = CourseSubject::factory()->create();

        $response = $this->get(route('course-subject.edit', $courseSubject));

        $response->assertOk();
        $response->assertViewIs('courseSubject.edit');
        $response->assertViewHas('courseSubject');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CourseSubjectController::class,
            'update',
            \App\Http\Requests\CourseSubjectUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $courseSubject = CourseSubject::factory()->create();
        $course = Course::factory()->create();
        $subject = Subject::factory()->create();

        $response = $this->put(route('course-subject.update', $courseSubject), [
            'course_id' => $course->id,
            'subject_id' => $subject->id,
        ]);

        $courseSubject->refresh();

        $response->assertRedirect(route('course-subject.index'));
        $response->assertSessionHas('courseSubject.id', $courseSubject->id);

        $this->assertEquals($course->id, $courseSubject->course_id);
        $this->assertEquals($subject->id, $courseSubject->subject_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $courseSubject = CourseSubject::factory()->create();

        $response = $this->delete(route('course-subject.destroy', $courseSubject));

        $response->assertRedirect(route('course-subject.index'));

        $this->assertDeleted($courseSubject);
    }
}
