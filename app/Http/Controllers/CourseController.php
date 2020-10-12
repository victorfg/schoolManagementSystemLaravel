<?php

namespace App\Http\Controllers;

use App\Events\NewCourse;
use App\Http\Requests\CourseEditRequest;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('course.create');
    }

    /**
     * @param \App\Http\Requests\CourseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());

        event(new NewCourse($course));

        $request->session()->flash('course.name', $course->name);

        return redirect()->route('course.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        $courses = Course::all();

        return view('course.show', compact('course'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course)
    {
        $course = $course->toArray();
        $course['active'] = $course['active']?'on':'';
        $course['date_start'] = Carbon::parse($course['date_start'])->format('Y-m-d');
        $course['date_end'] = Carbon::parse($course['date_end'])->format('Y-m-d');
        $course = (object)$course;
//        $course->fill([
//            'active' =>$course->active?'on':'',
//            'date_start' => Carbon::parse($course->date_start)->format('Y-m-d'),
//            'date_end' => Carbon::parse($course->date_end)->format('Y-m-d'),
//        ]);
        return view('course.edit', compact('course'));
    }

    /**
     * @param \App\Http\Requests\CourseUpdateRequest $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->validated());

        $request->session()->flash('course.id', $course->id);

        return redirect()->route('course.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
        $course->delete();

        return redirect()->route('course.index');
    }
}
