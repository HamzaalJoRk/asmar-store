<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class LevelRequest extends FormRequest
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
                    $rules_post += [$locale . '.title' => ['required', 'unique:level_translations,title', 'max:255']];
                } //end of for each
                $rules_post += [
                    'sort' => 'required|numeric',
                    'amount' => 'required|numeric',
                    'profit_percentage' => 'required|numeric|min:0|max:100',
                    'image' => 'nullable',
                ];
                return $rules_post;
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules_put = [];
                    foreach (config('translatable.locales') as $locale) {
                        $rules_put += [$locale . '.title' => ['required', Rule::unique('level_translations', 'title')->ignore($this->route()->level->id, 'level_id')]];
                    } //end of for each
                    $rules_put += [
                        'sort' => 'required|numeric',
                        'amount' => 'required|numeric',
                        'profit_percentage' => 'required|numeric|min:0|max:100',
                        'image' => 'nullable',
                    ];
                    return $rules_put;
            }
            default: break;
        }
    }
    public function messages()
    {
        return [
            'level.required'     =>  trans('validation.required'),
            'level.max'          =>  trans('validation.max'),
            'level.unique'       =>  trans('validation.unique'),
            'profit_percentage.required' => trans('validation.required'),
            'profit_percentage.numeric'  => trans('validation.numeric'),
            'profit_percentage.min'      => trans('validation.min.numeric', ['min' => 0]),
            'profit_percentage.max'      => trans('validation.max.numeric', ['max' => 100]),
        ];
    }
}
