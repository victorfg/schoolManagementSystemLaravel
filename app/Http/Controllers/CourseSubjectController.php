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

        return view('coursesubject.index', compact('course_subject'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('coursesubject.create');
    }

    /**
     * @param \App\Http\Requests\CourseSubjectStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseSubjectStoreRequest $request)
    {
        $coursesubject = Coursesubject::create($request->validated());

        event(new NewCourseSubject($course_subject));

        $request->session()->flash('coursesubject.name', $coursesubject->name);

        return redirect()->route('coursesubject.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CourseSubject $courseSubject)
    {
        $coursesubjects = Coursesubject::all();

        return view('coursesubject.show', compact('course_subject'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CourseSubject $courseSubject)
    {
        return view('coursesubject.edit', compact('course_subject'));
    }

    /**
     * @param \App\Http\Requests\CourseSubjectUpdateRequest $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function update(CourseSubjectUpdateRequest $request, CourseSubject $courseSubject)
    {
        $coursesubject->update($request->validated());

        $request->session()->flash('coursesubject.id', $coursesubject->id);

        return redirect()->route('coursesubject.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseSubject $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CourseSubject $courseSubject)
    {
        $coursesubject->delete();

        return redirect()->route('coursesubject.index');
    }
}
