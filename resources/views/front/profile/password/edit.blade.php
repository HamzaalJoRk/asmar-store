@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
        @lang('users.change_password')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <form method="post" action="{{ route('ad.profile.password.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    {{--old_password--}}
                                    <div class="form-group">
                                        <label>@lang('users.old_password')</label>
                                        <input type="password" name="old_password" class="form-control" value="" required>
                                    </div>
                                    @error('old_password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     {{--password--}}
                                    <div class="form-group">
                                        <label>@lang('users.password')</label>
                                        <input type="password" name="password" class="form-control" value="" required >
                                    </div>
                                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{--password_confirmation--}}
                                    <div class="form-group">
                                        <label>@lang('users.password_confirmation')</label>
                                        <input type="password" name="password_confirmation" class="form-control" value="" required>
                                    </div>
                                    @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>
                        </div>
                        <div class="form-group mt-3">
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
