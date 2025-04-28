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
        @lang('countries.countries')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.countries.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.countries.update',$country->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">@lang('countries.' . $locale . '.title')<span class="text-danger">*</span></label>
                                            <input type="text" name="{{ $locale }}[title]" class="form-control"
                                                value="{{ old($locale . '.title',$country->translate($locale)->title) }}">
                                            @error($locale . '.title')
                                                <div class="text-danger text-bold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('countries.sort')<span class="text-danger">*</span></label>
                                    <input type="number" name="sort" class="form-control" value="{{ old('sort',$country->sort) }}"
                                        placeholder="@lang('countries.sort')">
                                    @error('sort')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('countries.code_number')<span class="text-danger">*</span></label>
                                    <input type="number" name="code_number" class="form-control" value="{{ old('code_number',$country->code_number) }}"
                                        placeholder="@lang('countries.code_number')">
                                    @error('code_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('countries.is_active')<span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active',$country->is_active) == 1 ? 'selected' : null }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('is_active',$country->is_active) == 0 ? 'selected' : null }}>{{ __('Inactive') }}</option>
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
