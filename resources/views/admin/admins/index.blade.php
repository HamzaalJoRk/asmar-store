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
        @lang('admins.admins')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_admins'))
                                <a href="{{ route('ad.admins.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($admins) && !@empty($admins) && count($admins) > 0 )
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('admins.image')</th>
                                        <th scope="col">@lang('admins.name')</th>
                                        <th scope="col">@lang('admins.email')</th>
                                        <th scope="col">@lang('admins.phone')</th>
                                        <th scope="col">@lang('admins.status')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $index=>$admin)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <th scope="row">
                                                @if($admin->image)
                                                <img src="{{display_file($admin->image)}}" style="width: 50px; height: 50px;"
                                                alt="{{ $admin->name }}" >
                                                @else
                                                <img src="{{ asset('no-image.jpg') }}" style="width: 50px;" alt="{{ $admin->name }} ">
                                                @endif
                                            </th>
                                            <th scope="row">{{ $admin->name }}</th>
                                            <th scope="row">{{ $admin->email }}</th>
                                            <th scope="row">
                                                <a href="https://wa.me/{{ $admin->phone }}?text=" target="_blank" title="{{ $admin->phone }}">
                                                    <img src="{{ asset('whatsapp.png') }}" alt="whatsapp" width="35">
                                                </a>
                                            </th>
                                            <th scope="row">{{ __($admin->status())}}</th>
                                            <th scope="row">
                                                @if ($admin)
                                                    {{ $admin->created_at->diffForHumans() }} <br>
                                                    {{ $admin->created_at->format('Y-m-d') }}
                                                    ({{ $admin->created_at->format('h:i') }})
                                                    {{ ($admin->created_at->format('A')=='AM'?__('am') : __('pm')) }}  <br>
                                                @else
                                                {{ __('no_update') }}
                                                @endif
                                            </th>


                                            <td>
                                                @include('admin.admins.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $admins->appends(request()->all())->links() !!}
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
