<?php

namespace App\Http\Controllers;

use App\Events\NewCourseSubject;
use App\Http\Requests\CourseSubjectStoreRequest;
use App\Http\Requests\CourseSubjectUpdateRequest;
use App\Models\CourseSubject;
use Illuminate\Http\Request;

class CourseSubjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courseSubjects = CourseSubject::all();

        return view('courseSubject.index', compact('courseSubjects'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('courseSubject.create');
    }

    /**
     * @param \App\Http\Requests\CourseSubjectStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseSubjectStoreRequest $request)
    {
        $courseSubject = CourseSubject::create($request->validated());

        event(new NewCourseSubject($courseSubject));

        $request->session()->flash('courseSubject.name', $courseSubject->name);

        return redirect()->route('course-subject.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CourseSubject $courseSubject)
    {
        $courseSubjects = CourseSubject::all();

        return view('courseSubject.show', compact('courseSubject'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CourseSubject $courseSubject)
    {
        return view('courseSubject.edit', compact('courseSubject'));
    }

    /**
     * @param \App\Http\Requests\CourseSubjectUpdateRequest $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function update(CourseSubjectUpdateRequest $request, CourseSubject $courseSubject)
    {
        $courseSubject->update($request->validated());

        $request->session()->flash('courseSubject.id', $courseSubject->id);

        return redirect()->route('course-subject.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CourseSubject $courseSubject)
    {
        $courseSubject->delete();

        return redirect()->route('course-subject.index');
    }
}
