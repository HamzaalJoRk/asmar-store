@extends('front.layouts.master')

@section('title') @lang('translation.create transactions')  @endsection
@section('styles')

    <style>
        .payment_code_label{
            width:100%;
            margin-bottom:30px;
        }
        .bank-name{
            min-height:60px;
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
        .paymment_gateways_list{
            width:100%;
            padding:0;
            list-style:none;
            text-align:center;
        }
        .paymment_gateways_list li{
            margin-top:18px;
            flex: 1 1 25em;
            list-style-type: none;
            display: inline-block;
        }
        .paymment_gateways_list li a{
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
        .paymment_gateways_list li a .name_wrp{
            background-color: #aaa;
            padding: 1.5em 0 1.5em 0;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            background-position: center;
            transition: .3s;
        }
        .paymment_gateways_list li a .name_wrp .icon{
            flex: none;
            float:right;
            margin: 0 auto;
        }
        .paymment_gateways_list li a .name_wrp .icon img{
            height:32px;
        }
        .paymment_gateways_list li a .name_wrp .name{
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
        a.disabled{
            cursor: not-allowed;
        }
        .product-icon img{
            max-width:20px;
        }
        .icon div{
            width: 60px;
            height: 60px;
            color: #FFF;
            font-size: 24px;
            padding-top: 12px;
            border-radius: 10px;
            background: #03a9f4;
        }
    </style>
    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <style>


        </style>
    @else
        <style>
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

    @component('components.breadcrumb')
        @slot('li_1') @lang('translation.index')  @endslot
        @slot('title') @lang('translation.create transactions')  @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="card card-login mx-auto">
            <div class="card-body">

                <div class="form-group payment_gateways">
                    <div class="form-row">
                        <div class="w-100">
                            <ul class="paymment_gateways_list">
                                @isset($banks)
                                    @foreach($banks as $bank)
                                        <li class="col-xl-2 col-5 pr-0 pl-0">
                                            <a href="{{route('front.transactions.stepTwo',$bank->id)}}" class="payment_gateway">
                                                <div class="name_wrp" style="background-image:url('{{asset('images/icons/background.jpg')}}');">
                                                    <div class="icon">
                                                        <div>
                                                            <img src="{{asset('images/icons/cash.png')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="d-block mt-2 mb-2">{{$bank->title}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endisset

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('script')

@endsection
