@extends('front.layouts.master')

@section('title') @lang('translation.home') @endsection

@section('body')
    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class=" alert alert-warning">
                                <div class="row">
                                    <strong>
                                        <i class="fa fa-info-circle"></i>
                                        {{__('translation.Important note')}}:</strong>

                                    {{__('translation.Any account whose information does not match will be suspended by the administration')}}
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">

                            <div class="p-2">
                                <form method="POST" class="form-horizontal" action="{{ route('front.completeRegister.Post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="user_whatsapp" class="form-label">@lang('translation.user_whatsapp')</label>
                                        <input type="text" class="form-control @error('user_whatsapp') is-invalid @enderror" id="user_whatsapp"
                                               value="{{ old('user_whatsapp') }}" name="user_whatsapp" placeholder="@lang('translation.user_whatsapp')" autofocus required>
                                        @error('user_whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label">@lang('translation.country')</label>
                                            <select class="form-control select2" id="country_id" name="country_id">
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label">@lang('translation.city')</label>
                                            <select class="form-control select2" id="city_id" name="city_id">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mt-2">
                                        <div class="col">
                                            <label for="city">@lang('translation.area')</label>
                                            <input name="city" value="" required="" class="form-control" id="city" type="text" placeholder="@lang('translation.area')">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="address">@lang('translation.address')</label>
                                                <input name="address" value="" required="" class="form-control" id="address" type="address" placeholder="@lang('translation.address')">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                                type="submit">@lang('translation.Save')</button>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>

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
