@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
    @slot('li_1') @lang('site.home') @endslot
    @slot('title') @lang('categories.categories') @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <a href="{{ route('ad.categories.create') }}" class="btn btn-soft-primary">
                        <i class="fa fa-plus"></i> @lang('Add')
                    </a>
                </div>

                <div class="card-body">
                    @if(isset($categories) && $categories->count())
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('categories.name')</th>
                                        <th>@lang('categories.image')</th>
                                        <th>@lang('categories.active')</th>
                                        <th>@lang('Created_at')</th>
                                        <th>@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $i => $cat)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td>
                                                <img src="{{ $cat->image }}" alt="{{ $cat->name }}" width="60">
                                            </td>
                                            <td>{{ $cat->active ? __('Active') : __('Inactive') }}</td>
                                            <td>{{ $cat->created_at->diffForHumans() }}</td>
                                            <td>
                                                @include('admin.categories.action', ['category' => $cat])
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="float-right">
                                {!! $categories->links() !!}
                            </div>
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