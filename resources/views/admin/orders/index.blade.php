@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
        @lang('site.home')
        @endslot
        @slot('title')
        @lang('orders.orders')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    @if (@isset($orders) && !@empty($orders) && count($orders) > 0 )
                    <div class="row">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>@lang('translation.invoice_no')</th>
                                    <th scope="col">@lang('orders.user')</th>
                                    <th>@lang('translation.playerid')</th>
                                    <th>@lang('translation.playername')</th>
                                    <th>@lang('translation.status')</th>
                                    <th>@lang('translation.name')</th>
                                    <th>@lang('translation.qyt')</th>
                                    <th>@lang('translation.base_total')</th>
                                    <th>@lang('translation.profit_percentage')</th>
                                    <th>@lang('translation.profit')</th>
                                    <th>@lang('translation.final_total')</th>
                                    <th>@lang('translation.note')</th>
                                    <th>@lang('translation.date_at')</th>
                                    <th>@lang('translation.action')</th>

                                </tr>
                                </thead>
    
    
                                <tbody>
                                @foreach($orders as $order )
                                        @php($game=$order->game)
                                    <tr>
                                        <td>#{{$order->invoice_no}}</td>
                                        <th scope="row">{{ $order->user?->name }}</th>
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
                                        <td>{{$game?->title}}</td>
                                        <td> @if($order->package){{$order->qty}}  × {{$order->package->quantity}} {{$game->name_currency}} @else {{$order->qty}} {{$game->name_currency}} @endif</td>
                                        <td>{{$order->base_total}}</td>
                                        <td>{{$order->profit_percentage}}%</td>
                                        <td>{{$order->profit}}</td>
                                        <td>{{$order->final_total}}</td>
                                        <td>{{$order->details}}</td>
                                        <th scope="row">
                                                @if ($order)
                                                    {{ $order->created_at->diffForHumans() }} <br>
                                                    {{ $order->created_at->format('Y-m-d') }}
                                                    ({{ $order->created_at->format('h:i') }})
                                                    {{ ($order->created_at->format('A')=='AM'?__('am') : __('pm')) }}  <br>
                                                @else
                                                {{ __('no_update') }}
                                                @endif
                                            </th>
                                        <td>
                                            @include('admin.orders.action')
                                        </td>
                                    </tr>
    
                                @endforeach
    
    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="14">
                                            <div class="float-right">
                                                {!! $orders->appends(request()->all())->links() !!}
                                            </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                
                        </div>
                    @else
                        <div class="alert alert-danger">
                            {{ __('data_no_found') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
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

