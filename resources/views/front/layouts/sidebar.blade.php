<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                <li>
                    <a href="{{route('front.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-index">@lang('translation.index')</span>
                    </a>
                </li>

                @auth('web')

                    <li>
                        <a href="{{route('front.transactions')}}" class="waves-effect">
                            <i class="fa fa-money"></i>
                            <span key="t-index">@lang('translation.transactions')</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.transactions.create')}}" class="waves-effect">
                            <i class="fa fa-money"></i>
                            <span key="t-index">@lang('translation.create transactions')</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('front.orders','ALL')}}" class="waves-effect">
                            <i class="fa fa-truck"></i>
                            <span key="t-index">@lang('translation.myOrders')</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.agents')}}" class="waves-effect">
                            <i class="fa fa-truck"></i>
                            <span key="t-index">@lang('translation.agents')</span>
                        </a>
                    </li>


                @else
                    <li>
                        <a href="{{url('login')}}" class="waves-effect">
                            <i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>
                            <span key="t-login">@lang('translation.login')</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('register')}}" class="waves-effect">
                            <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                            <span key="t-register">@lang('translation.register')</span>
                        </a>
                    </li>
                @endauth

            </ul>
            <div class="alert-wrap mt-3 mr-2 ml-2">
                <div class="alert alert-success">
                    <strong class="pull-right">@lang('translation.Technical Support') : </strong>
                    <a href="{{setting('whatsup')}}" target="_blank"style="margin: 0px 5px;font-size: 18px;">
                        <i class="fa fa-whatsapp text-success pull-left" style="font-size:1.3em;"></i>
                    </a>
                    <a href="{{setting('telegram')}}" target="_blank" style="margin: 0px 5px;font-size: 18px;">
                        <i class="fa fa-telegram text-info pull-left pl-2" style="font-size:1.3em;"></i>
                    </a>

                </div>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
