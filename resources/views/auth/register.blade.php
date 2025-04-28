@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Register')
@endsection
@section('css')
    <link href="{{ asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('build/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('body')

    <body>
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free Skote account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ URL::asset('/build/images/profile-img.png') }}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="{{route('front.index')}}">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ display_file(setting('logo')) }}" alt=""
                                                     class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="POST" class="form-horizontal" action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">@lang('translation.Email')</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                                   value="{{ old('email') }}" name="email" placeholder="@lang('translation.Email')" autofocus required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">@lang('translation.user_name')</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                                   value="{{ old('username') }}" id="username" name="username" autofocus required
                                                   placeholder="@lang('translation.user_name')">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@lang('translation.currency')</label>
                                            <select class="form-control select2" name="currency_id">
                                                    @foreach($currencies as $currency)
                                                        <option value="{{$currency->id}}">{{$currency->code}}</option>
                                                    @endforeach
                                            </select>
                                            @error('currency_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">@lang('translation.Password')</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                                                   placeholder="@lang('translation.Password')" autofocus required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirmpassword" class="form-label">@lang('translation.Confirm Password')</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword" name="password_confirmation"
                                                   name="password_confirmation" placeholder="Enter Confirm password" autofocus required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">@lang('translation.register')</button>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>@lang('translation.Already have an account ?') <a href="{{ url('login') }}" class="fw-medium text-primary">
                                        @lang('translation.login') </a> </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('script')
        <script src="{{ asset('build/libs/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('build/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection
