<div class="row">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title"> @lang('translation.Add') @lang('translation.Games')</h4>
                <form class="needs-validation" novalidate method="post" action="{{route('ad.games.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">@lang('levels.' . $locale . '.leveltitle')<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="{{ $locale }}[title]" class="form-control"
                                            value="{{ old($locale . '.title') }}">
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
                                    <label for="validationCustom01" class="form-label">@lang('translation.keywords')
                                        ({{$locale}})</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="@lang('translation.keywords')" required name="{{ $locale }}[keywords]">
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
                                    <label for="validationCustom01" class="form-label">@lang('translation.name_currency')
                                        ({{$locale}})</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="@lang('translation.name_currency')" required
                                        name="{{ $locale }}[name_currency]">
                                    <div class="valid-feedback">
                                        @lang('translation.validName_currency')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.validName_currency')
                                    </div>
                                </div>
                            </div>
                        @endforeach





                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">
                                    @lang('translation.price_qty')</label>
                                <input type="number" class="form-control" id="validationCustom02"
                                    placeholder="@lang('translation.price_qty')" required name="price_qty" step="any">
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
                                <label for="validationCustom02" class="form-label">
                                    الفئة</label>
                                <select class="form-control" name="category_id" id="categories">
                                    <option value=""> اختر فئة </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('categories') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label"> @lang('translation.min_qty')</label>
                                <input type="number" class="form-control" id="validationCustom02"
                                    placeholder="@lang('translation.min_qty')" required name="min_qty">
                                <div class="valid-feedback">
                                    @lang('translation.validMin_qty')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('translation.invalidMin_qty').
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label"> @lang('translation.icon') <span
                                        class="text-danger">(1:1)</span></label>
                                <input type="file" class="form-control" id="validationCustom02" required name="icon">
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
                                <label for="validationCustom02" class="form-label"> @lang('translation.Background')<span
                                        class="text-danger">(163px * 115px )</span></label>
                                <input type="file" class="form-control" id="validationCustom02" required
                                    name="background">
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
                                <label for="validationCustom02" class="form-label"> @lang('translation.icon_coins')<span
                                        class="text-danger">(1:1 )</span></label>
                                <input type="file" class="form-control" id="validationCustom02" placeholder="icon coins"
                                    required name="icon_coins">
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
                                    <option selected disabled value=""> @lang('translation.Choose')</option>
                                    <option value="1">@lang('translation.active')</option>
                                    <option value="0">@lang('translation.unactive')</option>
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
                                    <option value="1">@lang('translation.show')</option>
                                    <option value="0">@lang('translation.hide')</option>
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="need_id_player"
                                        name="need_id_player" value="1">

                                    <label class="form-check-label" for="need_id_player">
                                        @lang('translation.need_id_player')
                                    </label>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="need_name_player"
                                        name="need_name_player" value="1">

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
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="background_package"
                                        name="have_packages" value="1">

                                    <label class="form-check-label" for="background_package">
                                        @lang('translation.have_packages')
                                    </label>

                                </div>

                            </div>
                        </div>


                    </div>



                    <div class="row card" style="display: none" id="btn_add">
                        <div class="row card-header">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">
                                        @lang('translation.background_package')<span class="text-danger">(1:1)</span>
                                    </label>
                                    <input type="file" class="form-control" id="validationCustom02"
                                        placeholder="background package" name="background_package">
                                    <div class="valid-feedback">
                                        @lang('translation.validBackground_package')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('translation.validBackground_package')
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <a class="btn btn-outline-success float-end" id="add_row">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-12 row card-body" id="div-append">

                        </div>


                    </div>







                    <div>
                        <button class="btn btn-primary" type="submit">@lang('translation.create')</button>
                    </div>
                </form>
                <div class=" d-none" id="PackageForm-black">
                    <div class="item row d-none">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">
                                    @lang('translation.price_qty')</label>
                                <input type="number" class="form-control" id="validationCustom02" required
                                    name="price_qty_package[]" step="any">
                                <div class="valid-feedback">
                                    @lang('translation.validPrice_qty')
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">
                                    @lang('translation.quantity')</label>
                                <input type="number" class="form-control" id="validationCustom02" required
                                    name="quantity_package[]">
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
                                    <option value="1">@lang('translation.active')</option>
                                    <option value="0">@lang('translation.unactive')</option>
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
                            <a class="btn btn-outline-danger" id="delete_row">
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
                    row = row.removeClass('d-none');
                    /// append the row
                    $('#div-append').append(row);
                    $("#btn_add").css('display', '');
                } else {
                    $("#btn_add").css('display', 'none');
                    $('#div-append').html('');

                }
            });

            $(document).on("click", '#add_row', function () {


                // clone the row
                var row = $("#PackageForm-black .item").clone();
                row = row.removeClass('d-none')
                /// append the row
                $('#div-append').append(row);

            });
            $(document).on('click', '#delete_row', function () {
                $(this).parent().parent().remove();

            })
        });
    </script>
@endsection