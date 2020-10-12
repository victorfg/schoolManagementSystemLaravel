<?php

namespace App\Http\Controllers;

use App\Events\NewSchedule;
use App\Helpers\WeekDays;
use App\Http\Requests\ScheduleStoreRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course, Subject $subject)
    {
        return view('calendar.index');
    }
}
