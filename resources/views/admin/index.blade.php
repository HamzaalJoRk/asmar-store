@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Dashboard @endslot
    @endcomponent


    <!-- end row -->

    <!-- end row -->

    <!-- Transaction Modal -->

    <!-- end modal -->

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>

@endsection

