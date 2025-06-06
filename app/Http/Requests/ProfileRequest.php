<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:admins,id,' . auth()->user()->id,
            'phone' => 'required|numeric|unique:admins,phone,' . auth()->user()->id,
            'image' => 'sometimes|nullable|image',
        ];

        return $rules;

    }//end of rules

}//end of request
