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
        @lang('agents.agents')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_agents'))
                                <a href="{{ route('ad.agents.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($agents) && !@empty($agents) && count($agents) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('agents.title')</th>
                                        <th scope="col">@lang('agents.number')</th>
                                        <th scope="col">@lang('agents.area')</th>
                                        <th scope="col">@lang('agents.address')</th>
                                        <th scope="col">@lang('agents.is_active')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $index=>$agent)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">{{ $agent['title'] }}</th>
                                            <th scope="row">{{ $agent['number'] }}</th>
                                            <th scope="row">{{ $agent['area'] }}</th>
                                            <th scope="row">{{ $agent['address'] }}</th>
                                            <th scope="row"> {{ __($agent->status())}}</th>
                                            <th scope="row">{{ $agent['created_at']->diffForHumans() }}</th>
                                            <td>
                                                @include('admin.agents.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $agents->appends(request()->all())->links() !!}
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
