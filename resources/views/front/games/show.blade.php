@extends('front.layouts.master')

@section('title') @lang('translation.index') @endsection
@section('styles')
    <link href="{{asset('build/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .card-login{
            max-width:none;
        }

        #clearsearch{
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            height: 16px;
            margin: auto;
            font-size: 16px;
            cursor: pointer;
            color: #ccc;
        }
        #clearsearch:hover{
            color:#000;
        }
        .altprice{
            color:grey;
            font-size:15px;
        }
        .products_list{
            width:100%;
            padding:0;
            list-style:none;
            text-align:center;
        }
        .products_list li{
            width:32.33%;
            margin-top:18px;
            flex: 1 1 25em;
            list-style-type: none;
            display: inline-block;
            max-width:125px;
        }
        .products_list li a{
            display: block;
            overflow: hidden;
            position: relative;
            margin: .5em;
            box-shadow: rgba(0,0,0,.25) 0 0 1em;
            border-radius: .5em;
            text-decoration: none;
            color: inherit;
            background: #fff;
        }
        .products_list li a .name_wrp{
            background-color: #aaa;
            padding: 1.5em 0 1.5em 0;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            background-position: center;
            transition: .3s;
        }
        .products_list li a .name_wrp .icon{
            flex: none;
            float:right;
            margin: 0 auto;
        }
        .products_list li a .name_wrp .icon img{
            height:60px;
        }
        .products_list li a .name_wrp .name{
            margin-right: 1em;
            font-size: 1.25em;
            font-weight: 700;
            color: #fff;
            flex: auto;
            max-height: 4.5em;
            overflow: hidden;
        }
        .select2 {
            width:100% !important;
        }
        .checkout .name_wrp{
            width:100px;
            height:100px;
            background-color: white !important;
        }
        .checkout .products_list li a .name_wrp .icon img{
            height:25px;
        }
        .checkout .products_list li {
            max-width: 125px;
            opacity: 80%;
            cursor: pointer;
        }

        .checkout .products_list li a{
            box-shadow:none;
            margin:0.2em;
        }
        .checkout .name_wrp .icon{
            position:absolute;
            top:0px;
            left:0px;
        }
        .checkout .name_wrp .checked{
            position:absolute;
            top:0px;
            right:0px;
            display:none;
        }
        .checkout .name_wrp .statusbadge{
            position:absolute;
            top:0px;
            right:0px;
        }
        .checkout .name_wrp .text{
            float: right;
            margin: 0 auto;
            font-weight: 700;
            font-size:12px;
            direction: ltr;
            width: 81px;
            text-align: center;
        }
        a.disabled{
            cursor: not-allowed;
        }
        .checkout .product_group .price{
            font-size:17px;
            text-align:center;
        }
        .product-icon img{
            max-width:20px;
        }
        @media (max-width: 420px) and (min-width: 400px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 400px) and (min-width: 380px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 380px) and (min-width: 360px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 360px) and (min-width: 340px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 340px) and (min-width: 320px) {
            .checkout .products_list li{
                margin-right:3%;
            }
        }
        @media (max-width: 320px) and (min-width: 310px) {
            .checkout .products_list li{
                margin-right:1%;
            }
        }
        @media (max-width: 310px) {
            .checkout .products_list li{
                margin: 0 auto;
            }
        }
        .product_group.disabled{
            opacity: 0.4;
        }
        .product_group.disabled.noopacity{
            opacity: 1;
        }
        .banner img{
            border-radius: 5px;
            max-width:368px;
        }
        #neworder .alert{
            width:100%;
        }
        .slider{
            width:100%;
            max-height:380px;
            overflow:hidden;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .slide-item{
            width:100%;
            overflow:hidden;
            background-size: cover !important;
            height: calc(100vw / 100 * 17);
            transition: background-image ease 1000ms;
        }
        @media (min-width: 1900px){
            .slide-item {
                height: calc((100vw / 100) * 21);
            }
        }
        @media (min-width: 1367px){
            .slide-item {
                height: calc((100vw / 100) * 19);
            }
        }
        @media (max-width: 991px) {
            .slide-item{
                height: calc((100vw / 100) * 27);
            }
        }
        @media (max-width: 600px) {
            .slide-item{
                height: calc((100vw / 100) * 30);
                background-size:100% calc((100vw / 100) * 30) !important;
            }
        }
        .processing-method img{
            max-width:21px;
        }
        span.statusbadge.badge.badge-danger {
            padding-bottom: 4px;
            background-color: #d72e2e;
        }
        i.fa.fa-refresh {
            font-size: 25px;
        }
        .pull-right {
            float: left;
        }
        .pull-left {
            float: right;
        }
        span.alert.alert-danger {
            margin-top: 5px !important;
            display: block;
        }
    </style>

    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <style>
            .pull-right {
                float: right;
            }
            .pull-left {
                float: left;
            }
            strong.product-name {
                margin-right: 10px;
            }
        </style>
    @else
        <style>
            strong.product-name {
                margin-left: 10px;
            }
            .products_list li a .name_wrp .icon {
                flex: none;
                float: left !important;
                right: 0;
                left: auto !important;
                margin: 0 auto;
            }
        </style>
    @endif
@endsection
@section('body')
    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('front.game.order')}}" id="neworder">
            @csrf
            <div class="checkout form-group">
                <div class="form-row">
                    <div class="col">
                        <ul class="products_list">
                            @if($game->have_packages)
                                @foreach($game->packages as $package)
                                    <li class="package" onclick="changePackage({{$package->id}},{{$package->quantity}},{{get_helper_price($package->price,false)}})">
                                        <a  data-id="{{$package->id}}" data-price="{{get_helper_price($package->price,false)}} " data-group="pubg" class="product_group @if(!$package->is_active || !$game->is_active) disabled @endif ">
                                            <div class="name_wrp" style="background-image:url({{$game->background_package}});">
                                                <div class="text">{{$game->title}} {{$package->quantity}} {{$game->name_currency}}</div>
                                                <div class="clear"></div>
                                                <div class="icon">
                                                    <img src="{{$game->icon_currancy}}">
                                                </div>
                                                <div class="checked" id="package-checked-{{$package->id}}">
                                                    <i class="fa fa-check text-success " style="font-size: 17px;font-weight: 900;"></i>
                                                </div>
                                                @if(!$package->is_active || !$game->is_active)
                                                    <span class="statusbadge badge badge-danger">{{__('translation.unavailable')}}</span>
                                                @endif

                                            </div>
                                            <div class="price">
                                                {{get_helper_price($package->price,true)}}
                                                <br>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                        @error('package_id')
                        <span class="alert alert-danger ">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                    <input type="hidden" id="qty_item" name="qty_item"  value="{{$game->have_packages ? 0 : 1}}">
                                    <div class="form-row">
                    <div class="col">
                        <input type="hidden" id="game_id" name="game_id" value="{{$game->id}}">
                        <input type="hidden" id="package_id" name="package_id" value="">
                    </div>
                </div>
                <div class="form-row row" id="checkout">
                    <div class="w-100 alert alert-info customAmount d-none pull-right">
                        <div class="pull-right w-100"> {{__('translation.Enter the quantity to be purchased')}}</div>
                    </div>
                    <div class="col-6">
                        <label for="qty">{{__('translation.qty')}}</label>
                        <input name="qty" value="1" class="form-control" id="qty" type="number" placeholder="{{__('translation.qty')}}">
                        @error('qty')
                            <span class="alert alert-danger ">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="total">@lang('translation.final_total')</label>
                        <input name="total" value="{{number_format($game->price_qty,10)}}" class="form-control" id="total" type="number" disabled>
                        
                        <!-- Hidden fields for calculations -->
                        <input name="base_total" value="{{number_format($game->price_qty,10)}}" class="form-control d-none" id="base_total" type="hidden">
                        <input name="profit_percentage" value="{{ auth()->check() ? auth()->user()->level->profit_percentage : 0 }}" class="form-control d-none" id="profit_percentage" type="hidden">
                        <input name="profit_amount" value="0" class="form-control d-none" id="profit_amount" type="hidden">
                        <input name="final_total" value="{{number_format($game->price_qty,10)}}" class="form-control d-none" id="final_total" type="hidden">
                        <input name="price_item" value="{{number_format($game->price_qty,10)}}" class="form-control" id="price_item" type="hidden">
                        <input name="currency_code" value="{{ get_currency_code() }}" class="form-control" id="currency_code" type="hidden">
                    </div>
                </div>
                <div class="row player_info">
                    @if($game->need_id_player)
                    <div class="col-6">
                        <label for="playerid">{{__('translation.playerid')}}</label>
                        <input name="playerid" type="tel" value="" class="form-control" required="" id="playerid" placeholder="{{__('translation.playerid')}}">
                        @error('playerid')
                        <span class="alert alert-danger ">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endif

                    @if($game->need_name_player)
                        <div class="col-6">
                            <label for="playername">{{__('translation.playername')}}</label>
                            <div style="display: flex;">
                                <input name="playername" value="" class="form-control" id="playername" type="text" >
                                <a href="#" id="reset_player_name" class="pull-right mr-2" style="display:none;"><i class="fa fa-times"></i></a>
                            </div>
                            @error('playername')
                            <span class="alert alert-danger ">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
            <div class="alert-wrap mt-3 checkout">
                <div class="alert alert-success product-info">
                    <span class="pull-left total_q" style="font-size:1em;"></span>
                    <span class="product-qty"></span>
                    <strong class="product-name mr-2 ml-2">{{$game->title}} <span class="package-qty"></span> {{$game->name_currency}}</strong>
                    <span>
                    <div class="pull-right product-icon">
                        <img src="{{$game->icon_currancy}}">
                        x
                    </div>
                </div>
            </div>
            <div>
                <div class="alert alert-info w-100 processing-method automatic pull-right">
                    <div class="pull-right w-100">
                        <img src="https://alza3eem.shop/img/smile.png">
                        &nbsp;
                        {{__('translation.This product operates automatically, 24 hours a day, all year round')}}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="note">{{__('translation.notes')}}:</label>
                <textarea name="note" class="form-control" id="note" placeholder="{{__('translation.Insert a note for the sales team (optional)')}}"></textarea>
            </div>
        </form>
        <div class="row mt-3">
            @auth()
            <button type="submit" 
                        class="btn btn-primary btn-block checkout w-50 m-auto"
                        id="submit"
                        onclick="this.disabled=true;document.getElementById('neworder').submit()">
                    {{__('translation.add')}}
                </button>
                <!-- <button type="submit" name="add"
                        class="btn btn-primary btn-block checkout w-50 m-auto"
                id="submit">{{__('translation.add')}}</button> -->
            @elseauth()

            @endauth
        </div>
    </div>
@endsection

@section('script')
    <!-- Sweet Alerts js -->
    <script src="{{asset('build/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    @if(session()->has('error_m'))
        <script>
            Swal.fire({
                title: '{{__('translation.error')}}',
                text: '{{session()->get('error_m')}}',
                icon: 'error',
            })
        </script>
    @endif

    @if(session()->has('message'))
        <script>
            Swal.fire({
                title:"{{__('translation.done')}}",
                text:"{{session()->get('message')}}",
                icon:"success"
            })
        </script>
    @endif
    <script>
        @if(!$game->have_packages) getQty(); @endif
        
        function changePackage(id, qty, price_item) {
            $('.package .checked').hide();
            $('#package-checked-'+id).show();
            $('#package_id').val(id);
            $('#qty_item').val(qty);
            $('#price_item').val(price_item);
            getQty();
        }
        
        function getQty() {
            var qty = $('#qty').val();
            var have_packages = {{$game->have_packages}};
            var qty_item = $('#qty_item').val();
            var currency_code = $('#currency_code').val();
            
            if(qty_item <= 0 || qty_item === '') {
                Swal.fire({
                    title: '{{__('translation.error')}}',
                    text: '{{__('translation.please_chose_items_first')}}',
                    icon: 'error',
                });
                return false;
            }
          
            if(have_packages === 1) {
                var qty_all = qty * qty_item;
                $('.package-qty').html(qty_item);
                $('.product-qty').html(qty);
            } else {
                $('.package-qty').hide();
                $('.product-qty').html(qty);
            }
            
            var base_price = $('#price_item').val();
            var profit_percentage = parseFloat($('#profit_percentage').val()) || 0;
            
            // Calculate final price with profit
            var final_price = base_price * (1 + (profit_percentage / 100));
            var total = (qty * final_price).toFixed(10);
            
            // Update UI
            $('#total').val(total);
            $('.total_q').text(total + ' ' + currency_code);
            
            // Update hidden calculation fields
            $('#base_total').val((qty * base_price).toFixed(10));
            $('#profit_amount').val((total - (qty * base_price)).toFixed(10));
            $('#final_total').val(total);
        }

        $(document).ready(function(){
            $('#qty').on('input', getQty);
            
            $('#neworder').submit(function(e) {
                const submitBtn = $('#submit');
                const qty_item = $('#qty_item').val();
                
                if(qty_item <= 0 || qty_item === '') {
                    Swal.fire({
                        title: '{{__('translation.error')}}',
                        text: '{{__('translation.please_chose_items_first')}}',
                        icon: 'error',
                    });
                    submitBtn.prop('disabled', false);
                    return false;
                }
                
                
                // Prevent double submission
                if(submitBtn.prop('disabled')) {
                    return false;
                }
                
                submitBtn.prop('disabled', true);
                submitBtn.html('<i class="fa fa-spinner fa-spin"></i> {{__('translation.processing')}}');
                return true;
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#qty').keyup(getQty);
            
            $('#neworder').submit(function(e) {
                const qty_item = $('#qty_item').val();
                if(qty_item <= 0 || qty_item === '') {
                    Swal.fire({
                        title: '{{__('translation.error')}}',
                        text: '{{__('translation.please_chose_items_first')}}',
                        icon: 'error',
                    });
                    $('#submit').prop('disabled', false);
                    return false;
                }
                return true;
            });
        });
    </script>


@endsection