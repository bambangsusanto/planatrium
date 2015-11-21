<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DesignFormRequest extends Request
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
            'type' => 'required',
            'type_spec' => 'required|max:20',
            'size_width' => 'required',
            'size_length' => 'required',
            'measurement' => 'required',
            'country' => 'required',
            'location_info' => 'required',
            'email' => 'required|email|max:30',
        ];
    }

    public function messages()
    {
        return [
            'size_width.required' => 'Please provide a valid size.',
            'size_length.required' => 'Please provide a valid size.',
            'country.required' => 'Please provide the country you wish to base your project.',
            'location_info.required' => 'Please provide more information regarding your location.',
            'email.required' => 'Please provide a proper email address.',
        ];
    }
}

?>