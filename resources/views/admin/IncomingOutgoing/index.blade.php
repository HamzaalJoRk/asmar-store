@extends('layouts.master')

@section('title', __('Financial Transactions'))

@section('css')
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
@endsection

@section('content')
    @component('components.breadcrumb')
    @slot('li_1') @lang('site.home') @endslot
    @slot('title') @lang('Financial Transactions') @endslot
    @endcomponent

    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('ad.finance.index', ['type' => 'in']) }}"
                    class="btn btn-success {{ $type == 'in' ? 'active' : '' }}">الوارد</a>
                <a href="{{ route('ad.finance.index', ['type' => 'out']) }}"
                    class="btn btn-danger {{ $type == 'out' ? 'active' : '' }}">الصادر</a>
            </div>

            <form method="GET" action="{{ route('ad.finance.index') }}" class="form-inline">
                <input type="hidden" name="type" value="{{ $type }}" />
                <div class="form-group mx-1">
                    <input type="date" name="from_date" class="form-control" placeholder="From" value="{{ $fromDate }}">
                </div>
                <div class="form-group mx-1">
                    <input type="date" name="to_date" class="form-control" placeholder="To" value="{{ $toDate }}">
                </div>
                <button type="submit" class="btn btn-primary">@lang('Filter')</button>
            </form>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="alert alert-success">
                <strong>مجموع الوارد</strong> {{ number_format($totalIn, 2) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="alert alert-danger">
                <strong>مجموع الصادر</strong> {{ number_format($totalOut, 2) }}
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            @if($items->count() > 0)
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('User')</th>
                                @if($type == 'in')
                                    <th>@lang('Invoice No')</th>
                                    <th>@lang('Player Name')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Quantity')</th>
                                @else
                                    <th>@lang('Invoice No')</th>
                                    <th>@lang('Account Number')</th>
                                    <th>@lang('Account Name')</th>
                                @endif
                                <th>@lang('Final Total')</th>
                                <th>@lang('Date')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user?->name ?? '-' }}</td>

                                    @if($type == 'in')
                                        <td>#{{ $item->invoice_no }}</td>
                                        <td>{{ $item->player_id }}</td>
                                        <td>{{ $item->player_name }}</td>
                                        <td>
                                            <span class="badge 
                                                                    @if($item->status == 'approved') bg-success
                                                                    @elseif($item->status == 'pending') bg-warning
                                                                    @else bg-danger @endif">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $item->qty }}</td>
                                    @else
                                        <td>#{{ $item->invoice_no }}</td>
                                        <td>{{ $item->account_number }}</td>
                                        <td>{{ $item->account_name }}</td>
                                    @endif

                                    <td>{{ number_format($item->final_total, 2) }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="{{ $type == 'in' ? 7 : 6 }}" class="text-end">@lang('Total'):</th>
                                <th>{{ number_format($total, 2) }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="mt-3">
                        {{ $items->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            @else
                <div class="alert alert-warning">@lang('No data found')</div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/js/pages/datatables.init.js') }}"></script>
@endsection