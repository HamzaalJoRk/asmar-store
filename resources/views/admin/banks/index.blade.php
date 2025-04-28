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
        @lang('banks.banks')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_banks'))
                                <a href="{{ route('ad.banks.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($banks) && !@empty($banks) && count($banks) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('banks.title')</th>
                                        <th scope="col">@lang('banks.minimum_payment')</th>
                                        <th scope="col">@lang('banks.limit_payment')</th>
                                        <th scope="col">@lang('banks.fee_percentage')</th>
                                        <th scope="col">@lang('banks.address')</th>
                                        <th scope="col">@lang('banks.is_active')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banks as $index=>$bank)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">{{ $bank['title'] }}</th>
                                            <th scope="row">{{ $bank['minimum_payment'] }}</th>
                                            <th scope="row">{{ $bank['limit_payment'] }}</th>
                                            <th scope="row">{{ $bank['fee_percentage'] }}</th>
                                            <th scope="row">{{ $bank['address'] }}</th>
                                            <th scope="row"> {{ __($bank->status())}}</th>
                                            <th scope="row">{{ $bank['created_at']->diffForHumans() }}</th>
                                            <td>
                                                @include('admin.banks.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $banks->appends(request()->all())->links() !!}
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
