<?php

namespace App\Http\Controllers;

use App\Events\NewCourseSubject;
use App\Helpers\UserTypes;
use App\Http\Requests\CourseSubjectStoreRequest;
use App\Http\Requests\CourseSubjectUpdateRequest;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class CourseSubjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        $courseSubjects = CourseSubject::where('course_id', $course->id)->get();
        return view('courseSubject.index', compact('course','courseSubjects'));
    }

    /**
     * @param \Illuminate\Http\Request $request,
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Course $course)
    {
        $courses = Course::all()->pluck('name','id');
        $subjects =  Subject::all()->pluck('name','id');
        return view('courseSubject.create', compact('course','courses','subjects'));
    }

    /**
     * @param \App\Http\Requests\CourseSubjectStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseSubjectStoreRequest $request, Course $course)
    {
        $courseSubject = CourseSubject::create($request->validated());

        event(new NewCourseSubject($courseSubject));

        $request->session()->flash('courseSubject.id', $courseSubject->id);

        return redirect()->route('subjects.index', compact('course'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course, CourseSubject $courseSubject)
    {
        $courseSubjects = CourseSubject::all();

        return view('courseSubject.show', compact('course','courseSubject'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course, CourseSubject $courseSubject)
    {
        return view('courseSubject.edit', compact('course','courseSubject'));
    }

    /**
     * @param \App\Http\Requests\CourseSubjectUpdateRequest $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function update(CourseSubjectUpdateRequest $request, Course $course, CourseSubject $courseSubject)
    {
        $courseSubject->update($request->validated());

        $request->session()->flash('courseSubject.id', $courseSubject->id);

        return redirect()->route('subjects.index', compact('course'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course, $courseSubjectId)
    {
        $courseSubject = CourseSubject::find($courseSubjectId);
        $courseSubject->delete();

        return redirect()->route('subjects.index', compact('course'));
    }
}
