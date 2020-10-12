<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentStoreRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'status' => ['required', 'integer'],
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

        return $item;
    }
}
