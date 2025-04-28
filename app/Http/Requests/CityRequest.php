<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CityRequest extends FormRequest
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
                    $rules_post += [$locale . '.title' => ['required', 'unique:city_translations,title', 'max:255']];
                } //end of for each
                $rules_post += ['sort' => 'nullable|numeric','country_id' => 'required|numeric','is_active' => 'nullable',];
                return $rules_post;
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules_put = [];
                    foreach (config('translatable.locales') as $locale) {
                        $rules_put += [$locale . '.title' => ['required', Rule::unique('city_translations', 'title')->ignore($this->route()->city->id, 'city_id')]];
                    } //end of for each
                    $rules_put += ['sort' => 'nullable|numeric','country_id' => 'required|numeric','is_active' => 'nullable',];
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
