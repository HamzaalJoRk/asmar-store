@extends('front.layouts.master')

@section('title') @lang('translation.agents') @endsection
@section('styles')


    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <style>


        </style>
    @else
        <style>
            .products_list li a .name_wrp .icon {
                flex: none;
                float: left !important;
                right: 0;
                left: auto !important;
                margin: 0 auto;
            }
        </style>
    @endif
@endsection
@section('body')
    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @lang('translation.index')  @endslot
        @slot('title') @lang('translation.agents')  @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('translation.agents') </h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr class="table-light">
                                <th>@lang('translation.title')</th>
                                <th>@lang('translation.phone')</th>
                                <th>@lang('translation.area')</th>
                                <th>@lang('translation.address')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($agents as $agent)
                                    <tr>
                                        <th >{{$agent->title}}</th>
                                        <td> <a href="https://wa.me/{{$agent->number}}" target="_blank" class="d-inline-block text-center">
                                                <i class="fa fa-whatsapp  text-success pull-left" style="font-size:1.7em;"></i>
                                            </a>

                                        </td>
                                        <td>{{$agent->area}}</td>
                                        <td>{{$agent->address}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')

@endsection
