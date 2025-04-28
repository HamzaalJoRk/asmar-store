@extends('front.layouts.master')

@section('title') @lang('translation.my_profile') @endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('translation.index')  @endslot
        @slot('title') @lang('translation.my_profile')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('front.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <label for="useremail" class="form-label">@lang('translation.Email')</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                       value="{{ old('email',$user->email) }}" name="email" placeholder="@lang('translation.Email')" autofocus required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="username" class="form-label">@lang('translation.user_name')</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                       value="{{ old('username',$user->user_name) }}" id="username" name="username" autofocus required
                                       placeholder="@lang('translation.user_name')">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">@lang('translation.currency')</label>
                                <select class="form-control select2" name="currency_id">
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}" @if(old('currency_id',$user->currency_id) ==$currency->id ) selected @endif>{{$currency->code}}</option>
                                    @endforeach
                                </select>
                                @error('currency_id')
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-3 pt-2">
                                <label for="user_whatsapp" class="form-label">@lang('translation.user_whatsapp')</label>
                                <input type="text" class="form-control @error('user_whatsapp') is-invalid @enderror" id="user_whatsapp"
                                       value="{{ old('user_whatsapp',$user->whats_app) }}" name="user_whatsapp" placeholder="@lang('translation.user_whatsapp')" autofocus required>
                                @error('user_whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3 pt-2">
                                    <label class="form-label">@lang('translation.country')</label>
                                    <select class="form-control select2" id="country_id" name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}"@if(old('country_id',$user->country_id) ==$country->id ) selected @endif>{{$country->title}}</option>
                                        @endforeach
                                    </select>

                            </div>
                            <div class="col-md-3 pt-2">
                                <label class="form-label">@lang('translation.city')</label>
                                <select class="form-control select2" id="city_id" name="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}"@if(old('city_id',$user->city_id) ==$city->id ) selected @endif>{{$city->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 pt-2">
                                    <label for="city">@lang('translation.area')</label>
                                    <input name="city" value="{{ old('area',$user->area) }}" required="" class="form-control" id="city" type="text" placeholder="@lang('translation.area')">
                            </div>
                            <div class="col-md-4 pt-2">
                                        <label for="address">@lang('translation.address')</label>
                                        <input name="address" value="{{ old('address',$user->address) }}" required="" class="form-control" id="address" type="address" placeholder="@lang('translation.address')">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('users.image')</label>
                                    <input type="file" name="image" class="form-control img" accept="image/*">
                                    <div class="col-md-4">
                                        @if($user->avatar)
                                            <img src="{{asset($user->avatar)}}" alt="{{ $user->name }}" class="img-thumbnail img-preview" width="200px">
                                        @else
                                            <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                                        @endif
                                    </div>
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
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
    <script>
        function getCitise() {
            var country_id = $('#country_id').val();
            $.ajax({
                url: "{{route('front.getCities','')}}/"+country_id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    var cities = res.cities;
                    $("#city_id")
                        .empty();
                    cities.forEach((city) => {

                        $("#city_id").append(new Option(city.title, city.id));

                    });
                }
            });
        }
        $(document).ready(function() {
            getCitise();
            $('#country_id').on('change', function() {
                getCitise();
            });
        });

    </script>
@endsection
