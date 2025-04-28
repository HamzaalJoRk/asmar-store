@extends('front.layouts.master-auth')

@section('title')
    @lang('translation.Login')
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
                                            <h5 class="text-primary">@lang('translation.Welcome Back !')</h5>
                                            <p>{{ App\Models\System::getProperty('app_name') }}.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ URL::asset('/build/images/profile-img.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="{{route('front.index')}}" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">

                                                <img src="{{ display_file(setting('logo')) }}" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="{{route('front.index')}}" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ display_file(setting('logo')) }}" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    @if(session()->has('errors'))
                                        <div class="alert alert-danger">
                                            {{session()->get('errors')->first()}}
                                        </div>
                                    @endif
                                        @if(session()->has('success'))
                                            <div class="text-center alert alert-success">
                                                {{session()->get('success')}}
                                            </div>
                                        @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('front.login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="user_name" class="form-label">@lang('translation.user_name')</label>
                                            <input name="user_name" type="text"
                                                class="form-control @error('user_name') is-invalid @enderror"
                                                value="{{ old('user_name') }}" id="user_name"
                                                placeholder="@lang('translation.user_name')"
                                                   autofocus>
                                            @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">@lang('translation.Password')</label>
                                            <div
                                                class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                <input type="password" name="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    id="userpassword"  placeholder=" @lang('translation.Password')"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                @lang('translation.Remember me')
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                @lang('translation.Log In')
                                            </button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            @if(session()->has('errors'))
                                                <a href="{{route('password.reset')}}" class="text-muted  " style="color: #924040 !important;"><i
                                                        class="mdi mdi-lock me-1"></i>  @lang('translation.Forgot your password?')</a>
                                            @endif

                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="mt-5 text-center">

                            <div>
                                <p>@lang('translation.Don\'t have an account ?') <a href="{{ url('register') }}" class="fw-medium text-primary">
                                        @lang('translation.Signup now') </a> </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

    @endsection
