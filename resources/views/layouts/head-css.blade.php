<meta charset="utf-8" />
<title> @yield('title') | Admin & Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{display_file(setting('fav_icon'))}}">
<!-- Bootstrap Css -->
<link href="{{ asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/select2/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .count-danger {
        padding: 5px 10px;
        background-color: #901616;
        border-radius: 50%;
    }
</style>
@if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <link href="{{ asset('build/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

@endif
@yield('css')
