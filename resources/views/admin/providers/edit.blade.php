@extends('layouts.master')
@section('title')
    {{ __('providers.providers') }}
@endsection

@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            {{ __('providers.providers') }}
        @endslot
        @slot('title')
            {{ __('common.edit') }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ad.providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('providers.name') }}<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $provider->name) }}"
                                        placeholder="{{ __('providers.name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('providers.api_url') }}<span class="text-danger">*</span></label>
                                    <input type="url" name="api_url" class="form-control" value="{{ old('api_url', $provider->api_url) }}"
                                        placeholder="{{ __('providers.api_url') }}">
                                    @error('api_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('providers.api_key') }}<span class="text-danger">*</span></label>
                                    <input type="text" name="api_key" class="form-control" value="{{ old('api_key', $provider->api_key) }}"
                                        placeholder="{{ __('providers.api_key') }}">
                                    @error('api_key')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('providers.logo') }}</label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                    @if($provider->getFirstMediaUrl('logo'))
                                        <img src="{{ $provider->getFirstMediaUrl('logo') }}" alt="{{ $provider->name }}" class="mt-2" style="max-width: 100px;">
                                    @endif
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('providers.api_endpoints') }}</label>
                                    <textarea name="api_endpoints" class="form-control">{{ old('api_endpoints', $provider->api_endpoints) }}</textarea>
                                    @error('api_endpoints')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('providers.description') }}</label>
                                    <textarea name="description" class="form-control">{{ old('description', $provider->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('providers.notes') }}</label>
                                    <textarea name="notes" class="form-control">{{ old('notes', $provider->notes) }}</textarea>
                                    @error('notes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('providers.is_active') }}<span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active', $provider->is_active) == 1 ? 'selected' : '' }}>{{ __('common.active') }}</option>
                                        <option value="0" {{ old('is_active', $provider->is_active) == 0 ? 'selected' : '' }}>{{ __('common.inactive') }}</option>
                                    </select>
                                    @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> {{ __('common.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection