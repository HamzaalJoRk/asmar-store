@extends('front.layouts.master')

@section('title')
    @lang('translation.index')
@endsection

@section('body')

    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection

    @section('content')
        {{-- عرض الإعلان فقط إذا كانت الحالة مفعل --}}
        @if($advertisement && $advertisement->active && $advertisement->getFirstMediaUrl('image'))
            <div class="text-center mb-4">
                {{-- تنسيق الصورة كإعلان --}}
                <div class="advertisement-container"
                    style="position: relative; display: inline-block; width: 100%; max-width: 600px;">
                    <img src="{{ $advertisement->getFirstMediaUrl('image') }}" alt="Advertisement" class="img-fluid rounded"
                        style="width: 100%; height: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

                    {{-- النص تحت الصورة --}}
                    @if($advertisement->description)
                        <div class="advertisement-text"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background: rgba(0, 0, 0, 0.6); color: white; padding: 10px; font-size: 1.2rem; border-radius: 5px;">
                            {{ $advertisement->description }}
                        </div>
                    @endif
                </div>
            </div>
        @endif

        {{-- شريط البحث --}}
        <div class="app-search d-lg-block mb-4 animate__animated animate__fadeInDown">
            <div class="position-relative">
                <input type="text" class="form-control" id="searchInput" placeholder="@lang('translation.Search')">
                <span class="bx bx-search-alt"></span>
            </div>
        </div>

        {{-- قائمة التصنيفات --}}
        <div class="row">
            <div class="form-group products">
                <div class="form-row">
                    <div class="w-100">
                        <ul class="products_list" id="products_list">
                            @isset($categories)
                                @foreach($categories as $category)
                                    <li class="col-4 pr-0 pl-0">
                                        <a href="{{ route('front.game.category', $category->id) }}"
                                            class="product_group @if(!$category->active || $category->games->count() == 0) disabled @endif"
                                            data-group="soulchill">
                                            <div class="name_wrp" style="background-image:url({{$category->image}});">
                                                <div class="icon">
                                                    <img src="{{ $category->image }}" alt="{{ $category->name }}" width="60">
                                                </div>
                                            </div>
                                            <span class="d-block mt-2 mb-2">{{$category->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        {{-- إضافة حركة عند الكتابة في شريط البحث --}}
        <script>
            $(document).ready(function () {
                // الحركة عند الكتابة
                $('#searchInput').on('input', function () {
                    $(this).addClass('animate__animated animate__pulse');
                    setTimeout(() => {
                        $(this).removeClass('animate__animated animate__pulse');
                    }, 500);
                });

                // فحص النص المدخل في البحث لعرض أو إخفاء التصنيفات
                $('#searchInput').on('keyup', function () {
                    var value = $(this).val().toLowerCase();
                    $('#products_list li').filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    @endsection