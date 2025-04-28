@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
        @lang('site.home')
        @endslot
        @slot('title')
        @lang('cities.cities')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.cities.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.cities.update',$city->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">@lang('cities.' . $locale . '.title')<span class="text-danger">*</span></label>
                                            <input type="text" name="{{ $locale }}[title]" class="form-control"
                                                value="{{ old($locale . '.title',$city->translate($locale)->title) }}">
                                            @error($locale . '.title')
                                                <div class="text-danger text-bold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('cities.sort')</label>
                                    <input type="number" name="sort" class="form-control" value="{{ old('sort',$city->sort) }}"
                                        placeholder="@lang('cities.sort')">
                                    @error('sort')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('cities.country')<span class="text-danger">*</span></label>
                                    <select name="country_id" class="form-control">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @forelse ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id',$city->country_id) == $country->id ? 'selected' : null }}>
                                                {{ $country->title }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('cities.is_active')</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active',$city->is_active) == 1 ? 'selected' : null }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('is_active',$city->is_active) == 0 ? 'selected' : null }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('Edit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
