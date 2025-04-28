@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection
@section('css')
    <style>
        .col-md-2 {
            margin: auto;
        }
        .hr-add{
            border: 0.5px solid #c9c9c9;
            margin: 6px 5%;
            width: 80%;
        }
        .row.card-header {
            background-color: #00000008;
            margin: 0 !important;
        }

    </style>
@endsection

@section('content')

    @if(isset($_GET['action'])=='addGame')
        <!-- end row -->
        @component('components.breadcrumb')
            @slot('li_1')
                @lang('site.home')
            @endslot
            @slot('title')
                @lang('translation.Add') @lang('translation.Games')
            @endslot
        @endcomponent
        @include('admin.games.add')
    @elseif(!isset($_GET['action']))
        <!-- end row -->
        @component('components.breadcrumb')
            @slot('li_1')
                @lang('site.home')
            @endslot
            @slot('title')
                @lang('levels.Games')
            @endslot
        @endcomponent
        @include('admin.games.view')
    @endif

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>


@endsection
