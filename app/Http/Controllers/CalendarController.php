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
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course, Subject $subject)
    {
        $days = WeekDays::getDayKeys();
        $daysNames = WeekDays::getDayNames();
        $week = $request->input('lweek');
        if(empty($week)) {
            $week = date('Y').'-W'.date('W');
        }

        $year = explode('-',$week)[0];
        $week = str_replace('W','',explode('-',$week)[1]);

        $week_start_date = Carbon::now()->setISODate($year,$week,1)->startOfDay();
        $week_end_date = Carbon::now()->setISODate($year,$week,7)->startOfDay();

        $rows = $this->getCalendarRows($week_start_date,$week_end_date);

        $calendar = $this->formatCalendarRows($rows,$year,$week);
        //dd($calendar);
        return view('calendar.index',compact('calendar','days','daysNames'));
    }
    private function getCalendarRows($week_start_date,$week_end_date)
    {
        $user = Auth::user();
        $query = Subject::query()
            ->select(DB::raw(
                'subjects.id as subject_id,subjects.name as subject_name,subjects.color as subject_color,'.
                    'schedules.days as scheduled_days,schedules.time_start,schedules.time_end,'.
                    'courses.name as course_name,courses.date_start,courses.date_end'))
            ->join('schedules','subjects.id', '=','schedules.subject_id')
            ->join('courses','schedules.course_id', '=','courses.id')
            ->join('course_subjects', function($join)
            {
                $join->on('course_subjects.course_id','=', 'courses.id');
                $join->on('course_subjects.subject_id','=', 'subjects.id');
            })
            ->join('enrollments','enrollments.course_id', '=','courses.id')
            ->where('courses.active',1)
            ->where('enrollments.user_id',$user->id)
            ->where(function ($query) use($week_start_date,$week_end_date){
                $query
                    ->where('courses.date_start', '<=', $week_start_date->format('Y-m-d'))
                    ->Where('courses.date_end', '>=', $week_start_date->format('Y-m-d'))
                    ->OrWhere('courses.date_start', '<=', $week_end_date->format('Y-m-d'))
                    ->Where('courses.date_end', '>=', $week_end_date->format('Y-m-d'))
                    ->OrWhere('courses.date_start', '>=', $week_start_date->format('Y-m-d'))
                    ->Where('courses.date_start', '<=', $week_end_date->format('Y-m-d'))
                    ->OrWhere('courses.date_end', '>=', $week_start_date->format('Y-m-d'))
                    ->Where('courses.date_end', '<=', $week_end_date->format('Y-m-d'));
            });
        //return [$query->toSql(),$query->getBindings()];
        return $query->get();
    }
    private function formatCalendarRows($rows,$year,$week)
    {
        try {
            $dayNumber = ['m'=>1,'t'=>2,'w'=>3,'r'=>4,'f'=>5,'s'=>6,'u'=>7];
            $calendar = ['m'=>[],'t'=>[],'w'=>[],'r'=>[],'f'=>[],'s'=>[],'u'=>[]];


            foreach($rows as $row){
                $days = explode("|",$row->scheduled_days);
                foreach($days as $day){
                    if($day==''){
                        continue;
                    }
                    $gendate = Carbon::now();
                    $gendate->setISODate($year,$week,$dayNumber[$day]); //year , week num , day
                    $course_start_date = Carbon::parse($row->date_start)->startOfDay();
                    $course_end_date = Carbon::parse($row->date_end)->endOfDay();

                    $curseInProgress = true;//$gendate>=$course_start_date & $gendate<=$course_end_date;
                    if($curseInProgress){

                        $data = [
                            'subject_id'=>$row->subject_id,
                            'subject_name'=>$row->subject_name,
                            'subject_color'=>$row->subject_color,
                            'course_name'=>$row->course_name,
                            'time_start'=>Carbon::parse($row->time_start)->format('H:i'),
                            'time_end'=>Carbon::parse($row->time_end)->format('H:i'),
                        ];
                    }
                    $calendar[$day][] = [
                        'date'=>$gendate->format('d-m-Y'),
                        'data'=>$data
                    ];

                }
            }
            return $calendar;
        }catch(Exception $ex){
        }
    }
}
