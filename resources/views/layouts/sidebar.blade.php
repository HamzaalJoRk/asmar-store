<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('site.menu')</li>
                <li>
                    <a href="{{route('ad.index')}}" class="active">
                        <i class="fa fa-home"></i>
                        <span key="t-dashboards">@lang('site.home')</span>
                    </a>
                </li>
                @if (auth()->user()->hasPermission('read_settings'))
                <li>
                    <a href="{{route('ad.settings.general')}}" >
                        <i class="fa fa-cogs"></i>
                        <span key="t-dashboards">@lang('settings.settings')</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_admins'))
                <li>
                    <a href="{{route('ad.admins.index')}}" >
                        <i class="fa fa-user"></i>
                        <span key="t-dashboards">{{ __('admins.admins') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_users'))
                <li>
                    <a href="{{route('ad.users.index')}}" >
                        <i class="fa fa-users"></i>
                        <span key="t-dashboards">{{ __('users.users') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_agents'))
                <li>
                    <a href="{{route('ad.agents.index')}}" >
                        <i class="fa fa-users"></i>
                        <span key="t-dashboards">{{ __('agents.agents') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_games'))
                <li>
                    <a href="{{route('ad.games.index')}}" >
                        <i class="fa fa-subway"></i>
                        <span key="t-dashboards">{{ __('games.games') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_games'))
                <li>
                    <a href="{{route('ad.categories.index')}}" >
                        <i class="fa fa-subway"></i>
                        <span key="t-dashboards">{{ __('categories.categories') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_banks'))
                <li>
                    <a href="{{route('ad.banks.index')}}" >
                        <i class="fa fa-bars"></i>
                        <span key="t-dashboards">{{ __('banks.banks') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_transactions'))
                <li>
                    <a href="{{route('ad.transactions.index')}}" >
                        <i class="fa fa-credit-card"></i>
                        <span key="t-dashboards">{{ __('transactions.transactions') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_levels'))
                <li>
                    <a href="{{route('ad.levels.index')}}" >
                        <i class="fa fa-user-secret"></i>
                        <span key="t-dashboards">{{ __('levels.levels') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_orders'))
                <li>
                    <a href="{{route('ad.orders.index')}}" >
                        <i class="fa fa-id-card"></i>
                        <span key="t-dashboards">{{ __('orders.orders') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_currencies'))
                <li>
                    <a href="{{route('ad.currencies.index')}}" >
                        <i class="fa fa-gift"></i>
                        <span key="t-dashboards">{{ __('currencies.currencies') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_providers'))
                <li>
                    <a href="{{route('ad.providers.index')}}" >
                        <i class="fa fa-user"></i>
                        <span key="t-dashboards">{{ __('providers.providers') }}</span> 
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_countries'))
                <li>
                    <a href="{{route('ad.countries.index')}}" >
                        <i class="fa fa-flag"></i>
                        <span key="t-dashboards">{{ __('countries.countries') }}</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_cities'))
                <li>
                    <a href="{{route('ad.cities.index')}}" >
                        <i class="fa fa-flag"></i>
                        <span key="t-dashboards">{{ __('cities.cities') }}</span>
                    </a>
                </li>
                @endif
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
