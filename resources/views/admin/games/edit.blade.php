@extends('layouts.master')

@section('title') @lang('translation.Dashboards') | @lang('translation.Edit') @lang('translation.Games')@endsection
@section('css')
    <style>
        a#add_row {
            width: 50%;
        }
        .img-old {
            margin: auto;
            text-align: center;
            padding: 5px;
        }
        .img-old img {
            max-height: 80px;

        }
        .col-md-2 {
            margin: auto;
        }
        .hr-add{
            border: 0.5px solid #c9c9c9;
            margin: 6px 5%;
            width: 80%;
        }
        .row.card-header {
            background-color: #00000008;
            margin: 0 !important;
        }
    </style>
@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            @lang('site.home')
        @endslot
        @slot('title')
            @lang('translation.edit') @lang('translation.Games')
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('translation.edit') @lang('translation.Games')   ( {{$game->title}})</h4>
                    <form class="needs-validation" novalidate method="post" action="{{route('ad.games.update',$game->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">@lang('levels.' . $locale . '.leveltitle')<span class="text-danger">*</span></label>
                                            <input type="text" name="{{ $locale }}[title]" class="form-control"
                                                   value="{{$game->title}}">
                                            @error($locale . '.title')
                                            <div class="text-danger text-bold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">@lang('translation.keywords') ({{$locale}})</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="@lang('translation.keywords')"
                                               required name="{{ $locale }}[keywords]"
                                        value="{{ $game->slug }}">
                                        <div class="valid-feedback">
                                            @lang('translation.validKeywords')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('translation.invalidKeywords')
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">@lang('translation.name_currency') ({{$locale}})</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="@lang('translation.name_currency')"
                                               required name="{{ $locale }}[name_currency]" value="{{ $game->name_currency }}">
                                        <div class="valid-feedback">
                                            @lang('translation.validName_currency')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('translation.validName_currency')
                                        </div>
                                    </div>
                                </div>
                            @endforeach





                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.price_qty')</label>
                                    <input type="number" class="form-control" id="validationCustom02" placeholder="@lang('translation.price_qty')"
                                           required name="price_qty" step="any" value="{{ $game->price_qty }}">
                                    <div class="valid-feedback">
                                        @lang('translation.validPrice_qty')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidPrice_qty').
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="categories" class="form-label">
                                    الفئة
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="category_id" id="categories" required>
                                        <option value="">اختر فئة </option>
                                        @foreach($categories as $category)
                                            <option 
                                                value="{{ $category->id }}" 
                                                {{ old('category_id', $game->category_id) == $category->id ? 'selected' : '' }}
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.min_qty')</label>
                                    <input type="number" class="form-control" id="validationCustom02" placeholder="@lang('translation.min_qty')"
                                           required name="min_qty" value="{{ $game->min_qty }}">
                                    <div class="valid-feedback">
                                        @lang('translation.validMin_qty')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidMin_qty').
                                    </div>
                                </div>
                            </div>


                        </div>

                        <input type="hidden" name="id" value="{{$game->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.icon')</label>
                                    <input type="file" class="form-control" id="validationCustom02"
                                            name="icon">
                                    @if($game->getFirstMediaUrl('icon'))
                                        <div class="img-old">
                                            <img src="{{$game->getFirstMediaUrl('icon')}}" >
                                        </div>
                                    @endif
                                    <div class="valid-feedback">
                                        @lang('translation.validIcon')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidIcon').
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.Background')</label>
                                    <input type="file" class="form-control" id="validationCustom02"
                                            name="background">
                                    @if($game->getFirstMediaUrl('background'))
                                        <div class="img-old">
                                            <img src="{{$game->getFirstMediaUrl('background')}}" >
                                        </div>
                                    @endif
                                    <div class="valid-feedback">
                                        @lang('translation.validBackground')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidBackground')
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.icon_coins')</label>
                                    <input type="file" class="form-control" id="validationCustom02" placeholder="icon coins"
                                            name="icon_coins">
                                    @if($game->getFirstMediaUrl('icon_coins'))
                                        <div class="img-old">
                                            <img src="{{$game->getFirstMediaUrl('icon_coins')}}" >
                                        </div>
                                    @endif
                                    <div class="valid-feedback">
                                        @lang('translation.validIcon_coins')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidIcon_coins')
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">@lang('translation.Status')</label>
                                    <select class="form-select" id="validationCustom03" required name="is_active">
                                        <option  disabled value=""> @lang('translation.Choose')</option>
                                        <option value="1" @if($game->is_active) selected @endif >@lang('translation.active')</option>
                                        <option value="0"@if(!$game->is_active)selected  @endif >@lang('translation.unactive')</option>
                                    </select>
                                    <div class="valid-feedback">
                                        @lang('translation.validStatus')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidStatus')

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">@lang('translation.is_show')</label>
                                    <select class="form-select" id="validationCustom03" required name="is_show">
                                        <option selected disabled value=""> @lang('translation.Choose')</option>
                                        <option value="1" @if($game->is_show) selected @endif >@lang('translation.show')</option>
                                        <option value="0"  @if(!$game->is_show) selected @endif >@lang('translation.hide')</option>
                                    </select>
                                    <div class="valid-feedback">
                                        @lang('translation.validIs_show')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidIs_show')

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check" >
                                        <input class="form-check-input" type="checkbox"  id="need_id_player"  @if($game->need_id_player) checked @endif name="need_id_player" value="1" >

                                        <label class="form-check-label" for="need_id_player" >
                                            @lang('translation.need_id_player')
                                        </label>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check" >
                                        <input class="form-check-input" type="checkbox"  id="need_name_player" name="need_name_player"   @if($game->need_name_player) checked @endif value="1" >

                                        <label class="form-check-label" for="need_name_player">
                                            @lang('translation.need_name_player')
                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row" id="last_row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check " >
                                        <input class="form-check-input" type="checkbox"   @if($game->have_packages) checked @endif  id="background_package" name="have_packages" value="1" >

                                        <label class="form-check-label" for="background_package">
                                            @lang('translation.have_packages')
                                        </label>

                                    </div>

                                </div>
                            </div>


                        </div>



                        <div class="row"   @if(!$game->have_packages) style="display: none" @endif  id="btn_add">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.background_package')</label>
                                    <input type="file" class="form-control" id="validationCustom02" placeholder="background package"
                                            name="background_package">
                                    @if($game->getFirstMediaUrl('background_package'))
                                        <div class="img-old">
                                            <img src="{{$game->getFirstMediaUrl('background_package')}}" >
                                        </div>
                                    @endif
                                    <div class="valid-feedback">
                                        @lang('translation.validBackground_package')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.validBackground_package')
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <a class="btn btn-outline-success float-end"  id="add_row">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="col-md-12 row " id="div-append">
                                @if($game->have_packages)
                                    @foreach($game->packages as $package)
                                        <div class="row">
                                            <input type="hidden" name="old_packages[]"  value="{{$package->id}}">
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">  @lang('translation.price_qty')</label>
                                                    <input type="number" class="form-control" id="validationCustom02"
                                                           required name="price_qty_package[]" step="any" value="{{$package->price}}">
                                                    <div class="valid-feedback">
                                                        @lang('translation.validPrice_qty')
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">  @lang('translation.quantity')</label>
                                                    <input type="number" class="form-control" id="validationCustom02"
                                                           required name="quantity_package[]"  value="{{$package->quantity}}">
                                                    <div class="valid-feedback">
                                                        @lang('translation.validQuantity')
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        @lang('translation.invalidQuantity').
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">

                                                <div class="mb-3">
                                                    <label for="validationCustom03" class="form-label">@lang('translation.Status')</label>
                                                    <select class="form-select" id="validationCustom03" required name="is_active_package[]">
                                                        <option  disabled > @lang('translation.Choose')</option>
                                                        <option value="1" @if($package->is_active) selected @endif >@lang('translation.active')</option>
                                                        <option value="0"@if(!$package->is_active)selected  @endif >@lang('translation.unactive')</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        @lang('translation.validStatus')
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        @lang('translation.invalidStatus')

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="btn btn-outline-danger"
                                                   id="delete_row">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </div>
                                            <hr class="hr-add">
                                        </div>
                                    @endforeach

                                @endif
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">@lang('translation.Provider') @lang('translation.Settings')</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="provider_type" class="form-label">@lang('translation.Provider_Type')</label>
                                                    <select class="form-select" id="provider_type" name="provider_type" required>
                                                        <option value="manual" {{ is_null($game->provider_id) ? 'selected' : '' }}>@lang('translation.Manual')</option>
                                                        <option value="auto" {{ !is_null($game->provider_id) ? 'selected' : '' }}>@lang('translation.Auto')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 provider-dependent" style="{{ is_null($game->provider_id) ? 'display: none;' : '' }}">
                                                <div class="mb-3">
                                                    <label for="provider_id" class="form-label">@lang('translation.Provider')</label>
                                                    <select class="form-select" id="provider_id" name="provider_id">
                                                        <option value="">@lang('translation.Choose')</option>
                                                        @foreach($providers as $provider)
                                                            <option value="{{ $provider->id }}" {{ $game->provider_id == $provider->id ? 'selected' : '' }}>
                                                                {{ $provider->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 provider-dependent" style="{{ is_null($game->provider_id) ? 'display: none;' : '' }}">
                                                <div class="mb-3">
                                                    <label for="provider_game_id" class="form-label">@lang('translation.Provider_Game')</label>
                                                    <select class="form-select" id="provider_game_id" name="provider_game_id">
                                                        <option value="">@lang('translation.Choose')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <br>
                        <div class="mt-5 text-center m-auto">
                            <button class="btn btn-primary" type="submit">@lang('translation.edit')</button>
                        </div>
                    </form>
                    <div class=" d-none"  id="PackageForm-black">
                        <div class="item row d-none"    >
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.price_qty')</label>
                                    <input type="number" class="form-control" id="validationCustom02"
                                           required name="price_qty_package[]" step="any">
                                    <div class="valid-feedback">
                                        @lang('translation.validPrice_qty')
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  @lang('translation.quantity')</label>
                                    <input type="number" class="form-control" id="validationCustom02"
                                           required name="quantity_package[]">
                                    <div class="valid-feedback">
                                        @lang('translation.validQuantity')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidQuantity').
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">@lang('translation.Status')</label>
                                    <select class="form-select" id="validationCustom03" required name="is_active_package[]">
                                        <option selected disabled value=""> @lang('translation.Choose')</option>
                                        <option value="1" >@lang('translation.active')</option>
                                        <option value="0" >@lang('translation.unactive')</option>
                                    </select>
                                    <div class="valid-feedback">
                                        @lang('translation.validStatus')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.invalidStatus')

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <a class="btn btn-outline-danger"
                                   id="delete_row">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </div>
                            <hr class="hr-add">
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
    @section('script')
        <script src="{{ URL::asset('build/libs/parsleyjs/parsley.min.js') }}"></script>

        <script src="{{ URL::asset('/build/js/pages/form-validation.init.js') }}"></script>

    <script>

        $(document).ready(function () {
            $("#need_name_player").change(function () {
                if (this.checked) {
                    $("#show_input_name_player").attr("type", 'text');
                } else {
                    $("#show_input_name_player").attr("type", 'hidden');
                    $("#show_input_name_player").val("");
                }
            });
            $("#need_id_player").change(function () {
                if (this.checked) {
                    $("#show_input_id_player").attr("type", 'text');
                } else {
                    $("#show_input_id_player").attr("type", 'hidden');
                    $("#show_input_id_player").val('');

                    ///clear input  id player   when uncheck

                }
            });

            $("#background_package").change(function () {
                if (this.checked) {
                    var row = $("#PackageForm-black .item").clone();
                    /// append the row row= row.removeClass('d-none')
                     row= row.removeClass('d-none')
                    $('#div-append').append(row);
                    $("#btn_add").css('display','');
                } else {
                    $("#btn_add").css('display','none');

                }
            });
            var i = 1;

            $(document).on("click",'#add_row', function () {


                // clone the row
                var row = $("#PackageForm-black .item").clone();
                row= row.removeClass('d-none')
                /// append the row
                $('#div-append').append(row);

            });
            $(document).on('click', '#delete_row', function () {
                $(this).parent().parent().remove();

            })

            // Provider type change handler
            $("#provider_type").change(function() {
                if ($(this).val() === 'auto') {
                    $(".provider-dependent").show();
                } else {
                    $(".provider-dependent").hide();
                    $("#provider_id").val('');
                    $("#provider_game_id").val('');
                }
            });

            // Provider change handler
            $("#provider_id").change(function() {
                var provider = $(this).val();
                if (provider) {
                    $.ajax({
                        url: '{{ route("ad.games.fetch-products") }}',
                        type: 'GET',
                        data: {
                            provider: provider
                        },
                        success: function(response) {
                            var gameSelect = $("#provider_game_id");
                            gameSelect.empty();
                            gameSelect.append('<option value="">@lang("translation.Choose")</option>');
                            
                            try {
                                if (Array.isArray(response)) {
                                    response.forEach(function(item) {
                                        if (item && item.id && item.name) {
                                            gameSelect.append(
                                                $('<option>', {
                                                    value: item.id,
                                                    text: item.name + ' - ' + item.price,
                                                })
                                            );
                                        }
                                    });
                                } else if (response.data && Array.isArray(response.data)) {
                                    response.data.forEach(function(item) {
                                        if (item && item.id && item.name) {
                                            gameSelect.append(
                                                $('<option>', {
                                                    value: item.id,
                                                    text: item.name
                                                })
                                            );
                                        }
                                    });
                                }
                            } catch (e) {
                                console.error('Error parsing response:', e);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching games:', error);
                            gameSelect.empty();
                            gameSelect.append('<option value="">@lang("translation.Choose")</option>');
                        }
                    });
                } else {
                    $("#provider_game_id").empty();
                    $("#provider_game_id").append('<option value="">@lang("translation.Choose")</option>');
                }
            });
        });
    </script>
@endsection


























