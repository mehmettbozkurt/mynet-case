<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name'        => 'required|string|max:255',
            'birthday'    => 'required|date',
            'gender'      => 'required|in:Male,Female',
            'address'     => 'required|string|max:255',
            'post_code'   => 'required|integer',
            'city_name'   => 'required|string|max:255',
            'country_name'=> 'required|string|max:255'
        ];
    }
}
