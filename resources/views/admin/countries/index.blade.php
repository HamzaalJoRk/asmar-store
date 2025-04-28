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
        @lang('countries.countries')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_countries'))
                                <a href="{{ route('ad.countries.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($countries) && !@empty($countries) && count($countries) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('countries.country')</th>
                                        <th scope="col">@lang('countries.code_number')</th>
                                        <th scope="col">@lang('countries.is_active')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $index=>$country)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">{{ $country['title'] }}</th>
                                            <th scope="row">{{ $country->code_number }}</th>
                                            <th scope="row">{{ __($country->status()) }}</th>
                                            <th scope="row"> {{ $country->created_at->format('Y-m-d') }}</th>
                                            <td>
                                                @include('admin.countries.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $countries->appends(request()->all())->links() !!}
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
