@extends('front.layouts.master')

@section('title') @lang('translation.index') @endsection

@section('body')

    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection
    @section('content')
        <div class="app-search d-lg-block">
            <div class="position-relative">
                <input type="text" class="form-control" id="searchInput" placeholder="@lang('translation.Search')">
                <span class="bx bx-search-alt"></span>
            </div>
        </div>
        <div class="container">
            <h3>الصنف: {{ $category->name }}</h3>
        </div>
        <div class="row">
            <div class="form-group products">
                <div class="form-row">
                    <div class="w-100">
                        <ul class="products_list" id="products_list">
                            @isset($games)
                                @foreach($games as $game)
                                    <li class="col-4 pr-0 pl-0">
                                        <a href="{{route('front.game.show', $game->slug)}}"
                                            class="product_group @if(!$game->is_active) disabled @endif" data-group="soulchill">
                                            <div class="name_wrp" style="background-image:url({{$game->background}});">
                                                <div class="icon">
                                                    <img src="{{$game->icon}}">
                                                </div>
                                            </div>
                                            <span class="d-block mt-2 mb-2">{{$game->title}}</span>
                                            <div class="keywords" style="display:none;">{{$game->keywords}}</div>
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
        <script>
            $(document).ready(function () {
                $('#searchInput').on('keyup', function () {
                    var value = $(this).val().toLowerCase();
                    $('#products_list li').filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });

        </script>
    @endsection