@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Recover_Password')
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
                                            <h5 class="text-primary"> @lang('translation.Password Reset')</h5>
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
                                                <img src="{{ URL::asset('/images/'. App\Models\System::getProperty('logo-light-sm')) }}" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                @if(session()->has('errors'))
                                    <div class="alert alert-danger">
                                        {{session()->get('errors')->first()}}
                                    </div>
                                @endif
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                @endif
                                <div class="p-2">
                                    @if (session('status'))
                                        <div class="alert alert-success text-center mb-4" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('front.reset.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">@lang('translation.Email')</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="useremail" name="email" placeholder="@lang('translation.Email')"
                                                value="{{ old('email') }}" id="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">@lang('translation.Reset')</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>@lang('translation.Remember It ?') <a href="{{ url('login') }}" class="fw-medium text-primary"> @lang('translation.Sign In here')</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
