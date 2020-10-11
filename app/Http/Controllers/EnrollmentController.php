<?php

namespace App\Http\Controllers;

use App\Events\NewEnrollment;
use App\Http\Requests\EnrollmentStoreRequest;
use App\Http\Requests\EnrollmentUpdateRequest;
use App\Models\Enrollment;
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
        return view('enrollment.create');
    }

    /**
     * @param \App\Http\Requests\EnrollmentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnrollmentStoreRequest $request)
    {
        $enrollment = Enrollment::create($request->validated());

        event(new NewEnrollment($enrollment));

        $request->session()->flash('enrollment.name', $enrollment->name);

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
        return view('enrollment.edit', compact('enrollment'));
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
