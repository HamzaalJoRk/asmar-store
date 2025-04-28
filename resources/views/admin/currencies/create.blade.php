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
        @lang('currencies.currencies')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.currencies.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.currencies.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('currencies.currency')<span class="text-danger">*</span></label>
                                    <input type="text" name="currency" class="form-control" value="{{ old('currency') }}"
                                        placeholder="@lang('currencies.currency')">
                                    @error('currency')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('currencies.code')</label>
                                    <input type="text" name="code" class="form-control" value="{{ old('code') }}"
                                        placeholder="@lang('currencies.code')">
                                    @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('currencies.symbol')</label>
                                    <input type="text" name="symbol" class="form-control" value="{{ old('symbol') }}"
                                        placeholder="@lang('currencies.symbol')">
                                    @error('symbol')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('currencies.rate')</label>
                                    <input type="number" name="rate" class="form-control" value="{{ old('rate') }}"
                                        placeholder="@lang('currencies.rate')" step='0.01'>
                                    @error('rate')<span class="text-danger">{{ $message }}</span>@enderror
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
