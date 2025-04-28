@extends('front.layouts.master')

@section('title') @lang('translation.myOrders') @endsection
@section('styles')
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css" />
    <style>
        .id_not_verified{
            /*
            background:#fdc9d1;
            */
        }
        @media only screen and (max-width: 350px){
            .moreinfo, .basicinfo, .table-head {
                font-size: 14px;
            }
        }
        @media only screen and (max-width: 576px){
            .moreinfo, .basicinfo, .table-head {
                font-size: 16px;
            }
        }
        .select2-container{
            width:100% !important;
        }

        span.alert_approved {
            background-color: #10c281;
            color: #fff;
            padding: 5px;
            border-radius: 9px;
        }
        span.alert_pending {
            background-color: #f1b44c;
            color: #fff;
            padding: 5px;
            border-radius: 9px;
        }
        span.alert_canceled {
            background-color: #9f0000;
            color: #fff;
            padding: 5px;
            border-radius: 9px;
        }
    </style>
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
        @slot('title') @lang('translation.myOrders')  @endslot
    @endcomponent


    <div class="container-fluid">

        <div class="form-group">
            <div class="form-row">
                <div class="col-auto">
                    <a class="btn btn-success" href="{{route('front.index')}}"><i class="fa fa-plus"></i> @lang('translation.Add a purchase order')</a>&nbsp;
                    <a class="btn btn-info" href="{{route('front.transactions.create')}}"><i class="fa fa-gift"></i> @lang('translation.recharge the balance')</a>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs mt-2">
            <li class="nav-item">
                <a class="nav-link @if($type != 'Pending') active @endif" href="{{route('front.orders','ALL')}}">@lang('translation.All')</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link @if($type == 'Pending') active @endif" href="{{route('front.orders')}}">@lang('translation.Pending')</a>
            </li>
        </ul>


        <div class="row">
            <div class="col-12">
                <div class="card pt-4">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 order-table">
                            <thead>
                            <tr>
                                <th>@lang('translation.invoice_no')</th>
                                <th>@lang('translation.playerid')</th>
                                <th>@lang('translation.playername')</th>
                                <th>@lang('translation.status')</th>
                                <th>@lang('translation.name')</th>
                                <th>@lang('translation.qyt')</th>
                                <th>@lang('translation.amount')</th>
                                <th>@lang('translation.note')</th>
                                <th>@lang('translation.date_at')</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($orders as $order )
                                    @php($game=$order->game)
                                <tr>
                                    <td>#{{$order->invoice_no}}</td>
                                    <td>{{$order->player_id}}</td>
                                    <td>{{$order->player_name}}</td>
                                    <td>
                                        <span class="alert_{{$order->status}}">
                                            {{__('translation.'.$order->status)}}
                                        </span>
                                        @if($order->status == 'canceled')
                                            <br>
                                            <br>
                                            <span class="w-100 text-center " >
                                              {{ $order-> reason}}
                                            </span>
                                        @endif

                                    </td>
                                    <td>{{$game->title}}</td>
                                    <td> @if($order->package){{$order->qty}}  × {{$order->package->quantity}} {{$game->name_currency}} @else {{$order->qty}} {{$game->name_currency}} @endif</td>
                                    <td>{{get_helper_price($order->final_total,true)}}</td>
                                    <td>{{$order->details}}</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>



@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('build/js/pages/datatables.init.js') }}"></script>
@endsection
