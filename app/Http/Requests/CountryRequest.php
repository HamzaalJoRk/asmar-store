<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CountryRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                $rules_post = [];
                foreach (config('translatable.locales') as $locale) {
                    $rules_post += [$locale . '.title' => ['required', 'unique:country_translations,title', 'max:255']];
                } //end of for each
                $rules_post += ['sort' => 'nullable|numeric','code_number' => 'required|numeric','is_active' => 'nullable',];
                return $rules_post;
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules_put = [];
                    foreach (config('translatable.locales') as $locale) {
                        $rules_put += [$locale . '.title' => ['required', Rule::unique('country_translations', 'title')->ignore($this->route()->country->id, 'country_id')]];
                    } //end of for each
                    $rules_put += ['sort' => 'nullable|numeric','code_number' => 'required|numeric','is_active' => 'nullable',];
                    return $rules_put;
            }
            default: break;
        }
    }
    public function messages()
    {
        return [
            'title.required'     =>  trans('validation.required'),
            'title.max'          =>  trans('validation.max'),
            'title.unique'       =>  trans('validation.unique'),
        ];
    }
}
