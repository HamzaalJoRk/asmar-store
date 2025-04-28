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
        @lang('agents.agents')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.agents.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.agents.update',$agent->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('agents.title')<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title',$agent->title) }}" placeholder="@lang('agents.title')" >
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('agents.number')<span class="text-danger">*</span></label>
                                    <input type="number" name="number" class="form-control" value="{{ old('number',$agent->number) }}" placeholder="@lang('agents.number')" >
                                    @error('number')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('agents.area')<span class="text-danger">*</span></label>
                                    <input type="text" name="area" class="form-control" value="{{ old('area',$agent->area) }}" placeholder="@lang('agents.area')" >
                                    @error('area')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('agents.address')<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address',$agent->address) }}" placeholder="@lang('agents.address')" >
                                    @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('agents.is_active')<span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active',$agent->is_active) == 1 ? 'selected' : null }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('is_active',$agent->is_active) == 0 ? 'selected' : null }}>{{ __('Inactive') }}</option>
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
