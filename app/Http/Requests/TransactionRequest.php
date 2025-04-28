<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string',
            'address' => 'required',
            'currency_id' => 'required|exists:currencies,id',
            'original_amount' => 'required|numeric',
            'date' => 'required|date',
            'payment_gateway' => 'required|exists:banks,id',
            'details' => 'nullable|max:1000',
        ];


    }
    /**
     * Filter the input data to remove HTML tags from text fields
     *
     * @param array|null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['name'] = preg_replace('/<[^>]*>/', '', $data['name']);
        $data['details'] = preg_replace('/<[^>]*>/', '', $data['details']);
        return $data;
    }
}
