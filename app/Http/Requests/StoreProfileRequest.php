<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProfileRequest extends Request
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
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'job' => 'required',
            'location' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please provide your first name',
            'first_name.alpha' => 'Please use alphabet in the name field',
            'last_name.required' => 'Please provide your last name',
            'last_name.alpha' => 'Please use alphabet in the name field',
            'job.required' => 'Please provide your occupation',
            'location.required' => 'Please provide your location',
        ];

    }
}
