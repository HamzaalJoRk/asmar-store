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
        @lang('levels.levels')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.levels.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.levels.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row">

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">@lang('levels.' . $locale . '.leveltitle')<span class="text-danger">*</span></label>
                                            <input type="text" name="{{ $locale }}[title]" class="form-control"
                                                value="{{ old($locale . '.title') }}">
                                            @error($locale . '.title')
                                                <div class="text-danger text-bold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('levels.sort')<span class="text-danger">*</span></label>
                                    <input type="number" name="sort" class="form-control" value="{{ old('sort') }}"
                                        placeholder="@lang('levels.sort')">
                                    @error('sort')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('levels.amount')<span class="text-danger">*</span></label>
                                    <input type="number" name="amount" class="form-control" value="{{ old('amount') }}"
                                        placeholder="@lang('levels.amount')">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('translation.profit_percentage')<span class="text-danger">*</span></label>
                                    <input type="number" name="profit_percentage" class="form-control" value="{{ old('profit_percentage') }}"
                                        placeholder="@lang('translation.profit_percentage')" step="0.01" min="0" max="100">
                                    @error('profit_percentage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('levels.image') }}</label>
                                        <input class="form-control img" name="image"  type="file" accept="image/*" >
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="200px">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa fa-plus"></i>@lang('Add')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
