@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
        @lang('site.home')
        @endslot
        @slot('title')
        @lang('currencies.currencies')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_currencies'))
                                <a href="{{ route('ad.currencies.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($currencies) && !@empty($currencies) && count($currencies) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('currencies.currency')</th>
                                        <th scope="col">@lang('currencies.code')</th>
                                        <th scope="col">@lang('currencies.rate')</th>
                                        <th scope="col">@lang('currencies.symbol')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($currencies as $index=>$currency)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">{{ $currency->currency }}</th>
                                            <th scope="row">{{ $currency->code }}</th>
                                            <th scope="row">{{ $currency->rate }}</th>
                                            <th scope="row">{{ $currency->symbol }}</th>
                                            <th scope="row"> {{ $currency->created_at->format('Y-m-d') }}</th>
                                            <td>
                                                @include('admin.currencies.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $currencies->appends(request()->all())->links() !!}
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
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
@endsection
