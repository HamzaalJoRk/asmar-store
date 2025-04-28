@extends('layouts.master')
@section('title')
    {{ __('providers.providers') }}
@endsection

@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            {{ __('providers.providers') }}
        @endslot
        @slot('title')
            {{ __('common.list') }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <a href="{{ route('ad.providers.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-plus"></i> {{ __('common.add') }}
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('providers.name') }}</th>
                                    <th scope="col">{{ __('providers.logo') }}</th>
                                    <th scope="col">{{ __('providers.api_url') }}</th>
                                    <th scope="col">{{ __('providers.is_active') }}</th>
                                    <th scope="col">{{ __('common.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($providers as $provider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $provider->name }}</td>
                                        <td>
                                            @if($provider->getFirstMediaUrl('logo'))
                                                <img src="{{ $provider->getFirstMediaUrl('logo') }}" alt="{{ $provider->name }}" style="max-width: 50px;">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $provider->api_url }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-{{ $provider->is_active ? 'success' : 'danger' }} font-size-11">
                                                {{ $provider->is_active ? __('common.active') : __('common.inactive') }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('ad.providers.edit', $provider->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ad.providers.destroy', $provider->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('common.confirm') }}')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">{{ __('common.no_data') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $providers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection