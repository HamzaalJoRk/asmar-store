<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
                    'title'         => 'required',
                    'number'        => 'required',
                    'area'          => 'required',
                    'address'       => 'required',
                    'is_active'     => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'         => 'required',
                    'number'        => 'required',
                    'area'          => 'required',
                    'address'       => 'required',
                    'is_active'     => 'required',
                ];
            }
            default: break;
        }
    }
}
