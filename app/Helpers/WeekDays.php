<?php


namespace App\Helpers;


class WeekDays
{
    public static function getDayKeys()
    {
        return config('calendar.keys');
    }
    public static function getDayNames()
    {
        return config('calendar.days');
    }
    public static function arrayDaysToString(Array $days)
    {
        $calendar = config('calendar.keys');
        $result = '';
        if(empty($days)){
            $days = [];
        }

        foreach($days as $day){
            $result .= $calendar[$day] . '|';
        }
        return $result;
    }
    public static function stringDaysToArray(String $days)
    {
        $daysCalendar = config('calendar.days');
        $selDays =  explode('|',$days);
        $result = [];
        foreach($selDays as $selDay){
            if(is_null($selDay)){
                continue;
            }
            if($selDay==''){
                continue;
            }
            $key = self::getDayNumberByLetter($selDay);
            if(is_null($key)){
                continue;
            }
            $result[$key] = $daysCalendar[$key];
        }
        return $result;
    }
    public static function stringDaysToNumberArray(String $days)
    {
        $selDays =  explode('|',$days);
        $result = [];
        foreach($selDays as $selDay){
            if(is_null($selDay)){
                continue;
            }
            if($selDay==''){
                continue;
            }
            $key = self::getDayNumberByLetter($selDay);
            if(is_null($key)){
                continue;
            }
            $result[] = $key;
        }
        return $result;
    }
    private static function getDayNumberByLetter($selDayLetter)
    {
        $keysCalendar = config('calendar.keys');

        $numberDay = array_search($selDayLetter, $keysCalendar);
        return $numberDay;
    }
}
