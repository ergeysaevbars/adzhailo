<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'project_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'between:1, 1000000'],
            'type' => ['required', 'string', 'max:255'],
            'company' => ['required', 'not_in:0'],
            'user' => ['required',  'not_in:0'],
            'date' => ['required', 'date'],
            'shift' => ['required', 'not_in:0'],
        ];
    }


}
