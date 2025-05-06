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
    @lang('users.users')
    @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->hasPermission('read_users'))
                                <a href="{{ route('ad.users.create') }}" class="btn btn-soft-primary">
                                    @lang('Add')
                                </a>
                            @endif
                            @if (auth()->user()->hasPermission('update_users'))
                                <form action="{{ route('ad.users.resetBalances') }}" method="POST" style="display:inline;" id="withdrawForm">
                                    @csrf
                                    <button type="button" class="btn btn-danger" onclick="confirmWithdraw()">
                                        سحب كل الأرصدة
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (@isset($users) && !@empty($users) && count($users) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('ID')</th>
                                        <th scope="col">@lang('users.image')</th>
                                        <th scope="col">@lang('users.name')</th>
                                        <th scope="col">@lang('users.email')</th>
                                        <th scope="col">@lang('users.phone')</th>
                                        <th scope="col">@lang('users.countrycity')</th>
                                        <th scope="col">@lang('users.currency')</th>
                                        <th scope="col">@lang('levels.level')</th>
                                        <th scope="col">@lang('levels.profit')</th>
                                        <th scope="col">@lang('users.user_balance')</th>
                                        <th scope="col">@lang('users.status')</th>
                                        <th scope="col">@lang('Created_at')</th>
                                        <th scope="col">@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <th scope="row">
                                                @if($user->avatar)
                                                    <img src="{{display_file($user->avatar)}}" style="width: 50px; height: 50px;"
                                                        alt="{{ $user->name }}">
                                                @else
                                                    <img src="{{ asset('no-image.jpg') }}" style="width: 50px;"
                                                        alt="{{ $user->name }} ">
                                                @endif
                                            </th>
                                            <th scope="row">{{ $user->name }}</th>
                                            <th scope="row">{{ $user->email }}</th>
                                            <th scope="row">
                                                <a href="https://wa.me/{{ $user->whats_app }}?text=" target="_blank"
                                                    title="{{ $user->whats_app }}">
                                                    <img src="{{ asset('whatsapp.png') }}" alt="whatsapp" width="35">
                                                </a>
                                            </th>
                                            <th scope="row">{{ $user->country?->title}}/{{ $user->city?->title}}</th>
                                            <th scope="row">{{ $user->currency?->currency}}</th>
                                            <th scope="row">{{ optional($user->level)->title }}</th>
                                            <th scope="row">{{ optional($user->level)->profit_percentage }}%</th>
                                            <th scope="row"> {{ $user->user_balance}} $
                                                <br>
                                                {{ $user->getExchangeRate() }} {{ $user->getExchangeSymbol() }}
                                            </th>
                                            <th scope="row">{{ __($user->status())}}</th>
                                            <th scope="row">
                                                {{-- {{ $user->created_at->format('Y-m-d h:i') }} --}}
                                                {{-- {{ ($user->created_at->format('A')=='AM'?__('am') : __('pm')) }} <br> --}}
                                                @if ($user)
                                                    {{ $user->created_at->diffForHumans() }} <br>
                                                    {{ $user->created_at->format('Y-m-d') }}
                                                    ({{ $user->created_at->format('h:i') }})
                                                    {{ ($user->created_at->format('A') == 'AM' ? __('am') : __('pm')) }} <br>
                                                @else
                                                    {{ __('no_update') }}
                                                @endif
                                            </th>


                                            <td>
                                                @include('admin.users.action')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            {!! $users->appends(request()->all())->links() !!}
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
    <script>
        function confirmWithdraw() {
            if (confirm("هل أنت متأكد أنك تريد سحب جميع أرصدة المستخدمين؟")) {
                document.getElementById('withdrawForm').submit();
            }
        }
    </script>
@endsection