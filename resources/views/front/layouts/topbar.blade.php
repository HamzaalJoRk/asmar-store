<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box mr-3 ml-3">


                <a href="{{route('front.index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ display_file(setting('logo')) }}" alt="{{ setting('website_name') }}"
                             height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ display_file(setting('logo')) }}"
                             alt="{{ setting('website_name') }}" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect  d-block d-lg-none" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            @auth('web')
                <a href="{{route('front.transactions.create')}}" class="alert alert-success pull-left mt-3 ml-2 mr-3" style="margin: 0 20px;margin-bottom:0;max-height:38px;padding-top:0.3rem;font-size:1.2em;color:#155724">
                    <strong class="">{{get_helper_price(auth()->user()->user_balance,true)}}</strong>
                </a>
                <a href="{{route('front.account-level')}}" class="pull-left  mt-3 ml-2 mr-3"style="margin-left: 10px;margin-right: 10px;">
                    <img src="{{asset('images/levels/5.png')}}" style="height:38px;">
                </a>
            @endauth

        </div>

    <div class="d-flex">


        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('images/flags/'.app()->getLocale().'-flag.png')}}" alt="Header Language" height="16">
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    @if($localeCode != App::getLocale())
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item notify-item language" data-lang="eng">
                            <img src="{{ asset ('images/flags/'.$localeCode.'-flag.png') }}" alt="{{ $properties['native'] }}" class="me-1" height="12"> <span class="align-middle">{{ $properties['native'] }}</span>
                        </a>


                    @endif
                @endforeach

            </div>
        </div>


        @auth('web')
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('build/images/users/avatar-1.jpg') }}"
                    alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="{{route('front.my-profile')}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">@lang('translation.Profile')</span></a>
                <a class="dropdown-item" href="{{route('front.transactions.create')}}"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">@lang('translation.recharge the balance')</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">@lang('translation.Logout')</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @endauth

    </div>
</div>
</header>
@auth('web')
<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password" autocomplete="current_password"
                            placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="{{ Auth::user()->id }}"
                            type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endauth
