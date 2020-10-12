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
        $week = $request->input('lweek');
        if(empty($week)) {
            $week = date('Y').'-W'.date('W');
        }

        $year = explode('-',$week)[0];
        $week = str_replace('W','',explode('-',$week)[1]);

        $week_start_date = (new DateTime())->setISODate($year, $week);
        $week_start_date->setTime(0, 0,0,0);
        $week_end_date = (new DateTime())->setISODate($year, $week,7);
        $week_end_date->setTime(0, 0,0,0);

        $rows = $this->getCalendarRows($week_start_date,$week_end_date);

        $calendar = $this->formatCalendarRows($rows,$year,$week);

        return view('calendar.index', compact('calendar'));
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
            ->where('enrollments.user_id',$user->id);
        //return [$query->toSql(),$query->getBindings()];
        return $query->get();
    }
    private function formatCalendarRows($rows,$year,$week)
    {
        try {
            $dayNumber = ['m'=>1,'t'=>2,'w'=>3,'r'=>4,'f'=>5,'s'=>6,'u'=>7];
            $calendar = [];

            foreach($rows as $row){
                if(empty($row)){
                    continue;
                }
                $days = explode("|",$row->days);
                dd($row);
                foreach($days as $day){
                    $gendate = new DateTime();
                    $gendate->setISODate($year,$week,$dayNumber[$day]); //year , week num , day
                    $gendate->setTime(0, 0,0,0);
                    $course_start_date = DateTime::createFromFormat('Y-m-d', $row['date_start']);
                    $course_start_date->setTime(0, 0,0,0);
                    $course_end_date = DateTime::createFromFormat('Y-m-d', $row['date_end']);
                    $course_end_date->setTime(0, 0,0,0);
                    $data = null;
                    $curseInProgress = $gendate>=$course_start_date & $gendate<=$course_end_date;
                    if($curseInProgress){
                        $data = [
                            'subject_id'=>$row['id_subject'],
                            'subject_name'=>$row['subject_name'],
                            'subject_color'=>$row['subject_color'],
                            'course_name'=>$row['course_name'],
                            'time_start'=>$row['time_start'],
                            'time_end'=>$row['time_end'],
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
