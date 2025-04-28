<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionadminRequest extends FormRequest
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
                    'user_id'=> 'required',
                    'bank_id'=> 'required',
                    'currency_id'=> 'required',
                    'invoice_no'=> 'required',
                    'account_number'=> 'required',
                    'account_name'=> 'required',
                    'status'=> 'nullable',
                    'final_total'=> 'required',
                    'date_at'=> 'required',
                    'details'=> 'required',
                    'reason'=> 'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'user_id'=> 'required',
                    'bank_id'=> 'required',
                    'currency_id'=> 'required',
                    'invoice_no'=> 'required',
                    'account_number'=> 'required',
                    'account_name'=> 'required',
                    'status'=> 'nullable',
                    'final_total'=> 'required',
                    'date_at'=> 'required',
                    'details'=> 'required',
                    'reason'=> 'nullable',
                ];
            }
            default: break;
        }
    }
}
