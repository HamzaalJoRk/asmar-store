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
        @lang('transactions.transactions')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_transactions'))
                                <a href="{{ route('ad.transactions.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($transactions) && !@empty($transactions) && count($transactions) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('transactions.user')</th>
                                        <th scope="col">@lang('transactions.bank')</th>
                                        <th scope="col">@lang('transactions.invoice_no')</th>
                                        <th scope="col">@lang('transactions.account_number')</th>
                                        {{-- <th scope="col">@lang('transactions.status')</th> --}}
                                        <th scope="col">@lang('transactions.final_total')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $index=>$transaction)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">{{ $transaction->user?->user_name }}</th>
                                            <th scope="row">{{ $transaction->bank?->title }}</th>
                                            <th scope="row">{{ $transaction->invoice_no }}</th>
                                            <th scope="row">{{ $transaction->account_number }}</th>
                                            {{-- <th scope="row" >
                                                @if(($transaction->status == 'pending'))
                                                    <a href="{{route('ad.transactions.change_status',encrypt($transaction->id))}}" title="
                                                        {{__('change')}} {{ ($transaction->status == 'pending') ? trans('approved') : trans('pending') }} ">
                                                        <button id="status-btn" class="btn btn-{{ $transaction->status == 'pending' ? 'warning' : 'success'  }}">
                                                            {{ __($transaction->status())}}
                                                        </button>
                                                    </a>
                                                    <i class='fa fa-toggle-on'></i>
                                                @elseif(($transaction->status == 'approved'))
                                                    <button id="status-btn" class="btn btn-{{ $transaction->status == 'approved' ? 'success' : 'danger'  }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#change{{ $transaction->id }}"
                                                        title="{{ __('change') }} {{ $transaction->status == 'approved' ? trans('canceled') : trans('approved') }} ">
                                                        {{ __($transaction->status())}}
                                                    </button>
                                                    <i class='fa fa-toggle-on'></i>
                                                @else
                                                    <a href="{{route('ad.transactions.change_status',encrypt($transaction->id))}}" title="
                                                        {{__('change')}} {{ ($transaction->status == 'canceled') ? trans('approved') : trans('canceled') }} ">
                                                        <button id="status-btn" class="btn btn-{{ $transaction->status == 'approved' ? 'success' : 'danger'  }}">
                                                            {{ __($transaction->status())}}
                                                        </button>
                                                    </a>
                                                    <i class='fa fa-toggle-on'></i>
                                                    <div title="{{ $transaction->reason ?? ' ' }}">
                                                        {{ $transaction->canceledBy?->name }}
                                                    </div>
                                                @endif
                                            </th> --}}
                                            <th scope="row"> {{number_format( $transaction->final_total,10)}}</th>
                                            <th scope="row">
                                                @if ($transaction)
                                                    {{ $transaction->created_at->diffForHumans() }} <br>
                                                    {{ $transaction->created_at->format('Y-m-d') }}
                                                    ({{ $transaction->created_at->format('h:i') }})
                                                    {{ ($transaction->created_at->format('A')=='AM'?__('am') : __('pm')) }}  <br>
                                                @else
                                                {{ __('no_update') }}
                                                @endif
                                            </th>

                                            <td>
                                                @include('admin.transactions.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $transactions->appends(request()->all())->links() !!}
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
