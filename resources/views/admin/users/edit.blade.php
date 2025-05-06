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
                            <a href="{{ route('ad.users.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.users.update',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                {{-- name --}}
                                <div class="form-group">
                                    <label>@lang('users.name')<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}"
                                        placeholder="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- email --}}
                                <div class="form-group">
                                    <label>@lang('users.email')<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}"
                                        placeholder="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- phone --}}
                                <div class="form-group">
                                    <label>الرصيد<span class="text-danger">*</span></label>
                                    <input type="tel" name="user_balance" class="form-control" value="{{ old('user_balance',$user->user_balance) }}"
                                        placeholder="@lang('users.phone')" step="any" />
                                    @error('user_balance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- phone --}}
                                <div class="form-group">
                                    <label>@lang('users.phone')<span class="text-danger">*</span></label>
                                    <input type="tel" name="whats_app" class="form-control" value="{{ old('whats_app',$user->whats_app) }}"
                                        placeholder="@lang('users.phone')" maxlength="11" minlength="11"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                    @error('whats_app')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- status --}}
                                <div class="form-group">
                                    <label>@lang('users.status')<span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active',$user->is_active) == 1 ? 'selected' : null }}>
                                            {{ __('Active') }}</option>
                                        <option value="0" {{ old('is_active',$user->is_active) == 0 ? 'selected' : null }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                    @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- password --}}
                                <div class="form-group">
                                    <label>@lang('users.password')<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                        value="{{ old('password') }}" placeholder="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- password_confirmation --}}
                                <div class="form-group">
                                    <label>@lang('users.password_confirmation')<span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        value="{{ old('password_confirmation') }}" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('users.currency')<span class="text-danger">*</span></label>
                                    <select name="currency_id" class="form-control">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @forelse ($currencys as $currency)
                                            <option value="{{ $currency->id }}"
                                                {{ old('currency_id',$user->currency?->id) == $currency->id ? 'selected' : null }}>
                                                {{ $currency->currency }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('currency_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('users.country')<span class="text-danger">*</span></label>
                                    <select name="country_id" class="form-control">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @forelse ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id',$user->country?->id) == $country->id ? 'selected' : null }}>
                                                {{ $country->title }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('users.city')<span class="text-danger">*</span></label>
                                    <select name="city_id" class="form-control">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @forelse ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ old('city_id',$user->city?->id) == $city->id ? 'selected' : null }}>
                                                {{ $city->title }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('city_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('levels.level')</label>
                                    <select name="level_id" class="form-control" required>
                                        <option value="" disabled>@lang('site.choose')</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}" {{ old('level_id', $user->level_id) == $level->id ? 'selected' : '' }}>
                                                {{ $level->title }} (@lang('levels.profit') {{ $level->profit_percentage }}%)
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>@lang('users.image') </label>
                                        <input class="form-control img" name="avatar" type="file" accept="image/*">
                                        @error('avatar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($user->avatar)
                                        <img src="{{display_file($user->avatar)}}" alt="{{ $user->name }}" class="img-thumbnail img-preview" width="200px">
                                    @else
                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('Edit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
