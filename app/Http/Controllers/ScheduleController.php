<?php

namespace App\Http\Controllers;

use App\Events\NewSchedule;
use App\Http\Requests\ScheduleStoreRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schedules = Schedule::all();

        return view('schedule.index', compact('schedules'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('schedule.create');
    }

    /**
     * @param \App\Http\Requests\ScheduleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleStoreRequest $request)
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
    public function show(Request $request, Schedule $schedule)
    {
        $schedules = Schedule::all();

        return view('schedule.show', compact('schedule'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Schedule $schedule)
    {
        return view('schedule.edit', compact('schedule'));
    }

    /**
     * @param \App\Http\Requests\ScheduleUpdateRequest $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleUpdateRequest $request, Schedule $schedule)
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
    public function destroy(Request $request, Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
