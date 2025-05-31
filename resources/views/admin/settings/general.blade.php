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
            @lang('settings.settings')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('ad.settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- لا حاجة لـ @method('post') لأن method="post" بالفعل --}}

                        <div class="row">
                            <div class="col-md-3">
                                {{-- logo --}}
                                <div class="form-group">
                                    <label>@lang('settings.logo')</label>
                                    <input type="file" name="logo" class="form-control img" accept="image/*"><br>
                                    @if (setting('logo'))
                                        <img src="{{ display_file(setting('logo')) }}" class="img-thumbnail img-preview" width="100px" alt="">
                                    @else
                                        <img src="{{ asset('no-image.jpg') }}" class="img-thumbnail img-preview" width="100px" alt="">
                                    @endif
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- fav_icon --}}
                                <div class="form-group">
                                    <label>@lang('settings.fav_icon')</label>
                                    <input type="file" name="fav_icon" class="form-control img2" accept="image/*"><br>
                                    @if (setting('fav_icon'))
                                        <img src="{{ display_file(setting('fav_icon')) }}" class="img-thumbnail img-preview2" width="100px" alt="">
                                    @else
                                        <img src="{{ asset('no-image.jpg') }}" class="img-thumbnail img-preview2" width="100px" alt="">
                                    @endif
                                    @error('fav_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- website_name --}}
                                <div class="form-group">
                                    <label>@lang('settings.website_name')</label>
                                    <input type="text" name="website_name" class="form-control" value="{{ old('website_name', setting('website_name')) }}">
                                    @error('website_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- title --}}
                                <div class="form-group">
                                    <label>@lang('settings.title')</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', setting('title')) }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- link --}}
                                <div class="form-group">
                                    <label>@lang('settings.link')</label>
                                    <input type="text" name="link" class="form-control" value="{{ old('link', setting('link')) }}">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- website_active --}}
                                <div class="form-group">
                                    <label>@lang('settings.website_active')</label>
                                    <select name="website_active" id="website_active" class="form-control">
                                        <option value="1" {{ old('website_active', setting('website_active')) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('website_active', setting('website_active')) == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('website_active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- keywords --}}
                                <div class="form-group">
                                    <label>@lang('settings.keywords')</label>
                                    <input type="text" name="keywords" class="form-control" value="{{ old('keywords', setting('keywords')) }}">
                                    @error('keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                {{-- email --}}
                                <div class="form-group">
                                    <label>@lang('settings.email')</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email', setting('email')) }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="whatsup" class="small-label">@lang('settings.whatsup')</label>
                                    <input type="text" name="whatsup" id="whatsup" class="form-control" value="{{ old('whatsup', setting('whatsup')) }}">
                                    @error('whatsup')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telegram" class="small-label">@lang('settings.telegram')</label>
                                    <input type="text" name="telegram" id="telegram" class="form-control" value="{{ old('telegram', setting('telegram')) }}">
                                    @error('telegram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                {{-- description --}}
                                <div class="form-group">
                                    <label>@lang('settings.description')</label>
                                    <textarea name="description" class="form-control">{{ old('description', setting('description')) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- meta_description --}}
                                <div class="form-group">
                                    <label>@lang('settings.meta_description')</label>
                                    <textarea name="meta_description" class="form-control">{{ old('meta_description', setting('meta_description')) }}</textarea>
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- meta_keywords --}}
                                <div class="form-group">
                                    <label>@lang('settings.meta_keywords')</label>
                                    <textarea name="meta_keywords" class="form-control">{{ old('meta_keywords', setting('meta_keywords')) }}</textarea>
                                    @error('meta_keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('settings.currencys')<span class="text-danger">*</span></label>
                                    <select name="currency_id" class="form-control">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @foreach ($currencys as $currency)
                                            <option value="{{ $currency->id }}" {{ old('currency_id', setting('currency_id')) == $currency->id ? 'selected' : '' }}>
                                                {{ $currency->currency }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('currency_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('settings.languages')<span class="text-danger">*</span></label>
                                    <select name="language" class="form-control select2">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language }}" {{ old('language', setting('language')) == $language ? 'selected' : '' }}>
                                                {{ $language }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('language')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('settings.timezone')<span class="text-danger">*</span></label>
                                    <select name="timezone" class="form-control select2">
                                        <option disabled selected>{{ __('select') }}</option>
                                        @foreach ($timezone_list as $timezone)
                                            <option value="{{ $timezone }}" {{ old('timezone', setting('timezone')) == $timezone ? 'selected' : '' }}>
                                                {{ $timezone }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('timezone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- submit --}}
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('Edit')</button>
                        </div>
                    </form><!-- end of form -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'نجاح',
            text: "{{ session('success') }}",
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'خطأ',
            text: "{{ session('error') }}",
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    @endif
</script>
@endsection
