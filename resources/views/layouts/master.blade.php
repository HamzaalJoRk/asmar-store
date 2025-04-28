<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.head-css')
    </head>
        {{-- @section('body')
        @show --}}
    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('sweetalert::alert')
            @include('layouts.topbar')
            @include('layouts.sidebar')
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
        @include('layouts.right-sidebar')
        @include('layouts.vendor-scripts')
    </body>
</html>
