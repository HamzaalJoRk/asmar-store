<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'api_url' => ['required', 'url', 'max:255'],
            'api_key' => ['required', 'string', 'max:255'],
            'api_endpoints' => ['nullable', 'json'],
            'description' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['boolean'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        // Only validate slug uniqueness when creating new provider
        if ($this->isMethod('post')) {
            $rules['slug'] = ['nullable', 'string', 'max:255', 'unique:providers,slug'];
        } else {
            $rules['slug'] = ['nullable', 'string', 'max:255', 'unique:providers,slug,' . $this->provider->id];
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        if ($this->has('is_active')) {
            $this->merge([
                'is_active' => true,
            ]);
        } else {
            $this->merge([
                'is_active' => false,
            ]);
        }

        if (empty($this->slug) && $this->has('name')) {
            $this->merge([
                'slug' => \Str::slug($this->name),
            ]);
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('providers.name')]),
            'api_url.required' => __('validation.required', ['attribute' => __('providers.api_url')]),
            'api_url.url' => __('validation.url', ['attribute' => __('providers.api_url')]),
            'api_key.required' => __('validation.required', ['attribute' => __('providers.api_key')]),
            'api_endpoints.json' => __('validation.json', ['attribute' => __('providers.api_endpoints')]),
            'logo.image' => __('validation.image', ['attribute' => __('providers.logo')]),
            'logo.mimes' => __('validation.mimes', ['attribute' => __('providers.logo'), 'values' => 'jpeg,png,jpg,gif']),
            'logo.max' => __('validation.max.file', ['attribute' => __('providers.logo'), 'max' => '2MB']),
            'slug.unique' => __('validation.unique', ['attribute' => __('providers.slug')]),
        ];
    }
}
