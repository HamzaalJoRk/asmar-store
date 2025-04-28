<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name'          => 'required',
                    'email'         => 'required|email|max:255|unique:users',
                    'whats_app'     => 'required|numeric|unique:users',
                    'is_active'     => 'required',
                    'password'      => 'required|min:6|confirmed',
                    'avatar'        => 'nullable',
                    'currency_id'   => 'nullable',
                    'country_id'    => 'nullable',
                    'city_id'       => 'nullable',
                    'level_id'      => 'required|exists:levels,id',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required',
                    'email'         => 'required|email|max:255|unique:users,email,'.$this->route()->user->id,
                    'whats_app'     => 'required|numeric|unique:users,whats_app,'.$this->route()->user->id,
                    'is_active'     => 'required',
                    'password'      => 'nullable|min:6|confirmed',
                    'avatar'        => 'nullable',
                    'currency_id'   => 'nullable',
                    'country_id'    => 'nullable',
                    'city_id'       => 'nullable',
                    'level_id'      => 'required|exists:levels,id',
                ];
            }
            default: break;
        }
    }
}
