<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
                    'currency'=> 'required',
                    'code'=> 'nullable',
                    'rate'=> 'nullable',
                    'symbole'=> 'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'currency'=> 'required',
                    'code'=> 'nullable',
                    'rate'=> 'nullable',
                    'symbole'=> 'nullable',
                ];
            }
            default: break;
        }
    }
}
