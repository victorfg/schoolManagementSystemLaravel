<?php

namespace App\Http\Controllers;

use App\Events\NewSchedule;
use App\Http\Requests\ScheduleStoreRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course, Subject $subject)
    {
        $schedules = Schedule::where('course_id', $course->id)->where('subject_id', $subject->id)->get();

        return view('schedule.index', compact('schedules','course','subject'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Course $course, Subject $subject)
    {
        $courses = Course::all()->pluck('name','id');
        $subjects =  Subject::all()->pluck('name','id');
        return view('schedule.create',compact('course','subject','courses','subjects'));
    }

    /**
     * @param \App\Http\Requests\ScheduleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleStoreRequest $request, Course $course, Subject $subject)
    {
        $schedule = Schedule::create($request->validated());

        event(new NewSchedule($schedule));

        $request->session()->flash('schedule.id', $schedule->id);

        return redirect()->route('schedule.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course, Subject $subject, Schedule $schedule)
    {
        $schedules = Schedule::all();

        return view('schedule.show', compact('schedule'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course, Subject $subject, Schedule $schedule)
    {
        return view('schedule.edit', compact('schedule'));
    }

    /**
     * @param \App\Http\Requests\ScheduleUpdateRequest $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleUpdateRequest $request, Course $course, Subject $subject, Schedule $schedule)
    {
        $schedule->update($request->validated());

        $request->session()->flash('schedule.id', $schedule->id);

        return redirect()->route('schedule.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course, Subject $subject, Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
