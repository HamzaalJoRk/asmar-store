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
        @lang('levels.levels')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_levels'))
                                <a href="{{ route('ad.levels.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($levels) && !@empty($levels) && count($levels) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('levels.image')</th>
                                        <th scope="col">@lang('levels.title')</th>
                                        <th scope="col">@lang('levels.amount')</th>
                                        <th scope="col">@lang('translation.profit_percentage')</th>
                                        <th scope="col">@lang('levels.sort')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($levels as $index=>$level)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">
                                                @if($level->image)
                                                    <img src="{{display_file($level->image)}}" style="width: 50px;" alt="{{ $level->title }}">
                                                @else
                                                    <img src="{{ asset('no-image.jpg') }}" style="width: 50px;" alt="{{ $level->title }}">
                                                @endif
                                            </th>
                                            <th scope="row">{{ $level->title }}</th>
                                            <th scope="row">{{ $level->amount }}</th>
                                            <th scope="row">{{ $level->profit_percentage }}%</th>
                                            <th scope="row">{{ $level->sort }}</th>
                                            <td>
                                                @include('admin.levels.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $levels->appends(request()->all())->links() !!}
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
