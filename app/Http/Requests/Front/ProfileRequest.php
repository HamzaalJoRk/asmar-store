<?php

namespace App\Http\Requests\Front;

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
            'email' => 'required|email|unique:users,id,' . auth()->user()->id,
            'username' => 'required|string|unique:users,user_name,' . auth()->user()->id,
            'user_whatsapp' => 'required|numeric',
            'currency_id' => 'required|exists:currencies,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'image' => 'sometimes|nullable|image',
            'city' => 'required|max:100',
            'address' => 'required|max:200'

        ];

        return $rules;

    }//end of rules

}//end of request
