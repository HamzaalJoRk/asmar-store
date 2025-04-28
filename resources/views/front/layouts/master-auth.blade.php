<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | {{ setting('website_name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content=" {{env('APP_NAME')}}" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ display_file(setting('fav_icon')) }}">
        @include('front.layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('front.layouts.vendor-scripts')
    </body>
</html>
