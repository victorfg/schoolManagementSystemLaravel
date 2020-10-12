<?php

namespace App\Http\Controllers;

use App\Events\NewEnrollment;
use App\Helpers\UserTypes;
use App\Http\Requests\EnrollmentStoreRequest;
use App\Http\Requests\EnrollmentUpdateRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enrollments = Enrollment::all();

        return view('enrollment.index', compact('enrollments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $courses = Course::all()->pluck('name','id');
        $students = User::where('type',UserTypes::getIdUserTypesByName('student'))->get()
            ->pluck('name','id');
        return view('enrollment.create', compact('courses','students'));
    }

    /**
     * @param \App\Http\Requests\EnrollmentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnrollmentStoreRequest $request)
    {
        $enrollment = Enrollment::create($request->validated());

        event(new NewEnrollment($enrollment));

        $request->session()->flash('enrollment.id', $enrollment->id);

        return redirect()->route('enrollment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enrollment $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Enrollment $enrollment)
    {
        $enrollments = Enrollment::all();

        return view('enrollment.show', compact('enrollment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enrollment $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Enrollment $enrollment)
    {
        $courses = Course::all()->pluck('name','id');
        $students = User::where('type',UserTypes::getIdUserTypesByName('student'))->get()
            ->pluck('name','id');
        return view('enrollment.edit', compact('enrollment'), compact('courses','students'));
    }

    /**
     * @param \App\Http\Requests\EnrollmentUpdateRequest $request
     * @param \App\Models\Enrollment $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(EnrollmentUpdateRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->validated());

        $request->session()->flash('enrollment.id', $enrollment->id);

        return redirect()->route('enrollment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enrollment $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollment.index');
    }
}
