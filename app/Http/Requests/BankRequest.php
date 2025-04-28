<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
                    'title'=> 'required',
                    'minimum_payment'=> 'required|numeric',
                    'limit_payment'=> 'required|numeric',
                    'fee_percentage'=> 'required|numeric',
                    'address'=> 'required',
                    'is_active'=> 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'=> 'required',
                    'minimum_payment'=> 'required|numeric',
                    'limit_payment'=> 'required|numeric',
                    'fee_percentage'=> 'required|numeric',
                    'address'=> 'required',
                    'is_active'=> 'required',
                ];
            }
            default: break;
        }
    }
}
