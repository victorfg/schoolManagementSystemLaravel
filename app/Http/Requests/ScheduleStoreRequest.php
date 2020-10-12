<?php

namespace App\Http\Requests;

use App\Helpers\WeekDays;
use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'time_start' => ['required'],
            'time_end' => ['required'],
            'active' => [],
            'days'=>[]
        ];
    }
    public function validated()
    {
        $item = $this->validator->validated();

        if(empty($item['active'])){
            $item['active'] = false;
        }

        if(!is_bool($item['active'])){
            $item['active'] = $item['active'] == 'on';
        }

        $item['days'] = WeekDays::arrayDaysToString($item['days']);

        return $item;
    }
}
