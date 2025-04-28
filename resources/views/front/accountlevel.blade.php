@extends('front.layouts.master')

@section('title') {{__('translation.User segments')}} @endsection

@section('body')
    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection
@section('styles')
<style>
    .card-login {
        max-width: 25rem;
    }
    .as7ab-current-level img {
        width: auto !important;
    }

    .progress-bar{
        border-top-right-radius: 40px !important;
        border-bottom-right-radius: 40px !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .progress{
        height:25px;
        float:right;
        width:76%;
        margin-right:4%;
        margin-left:4%;
        border-radius: 40px !important;
        background-color: white !important;

        /* Changes below */
        -webkit-box-shadow: inset 0 0 0 2px #337AB7 !important;
        -moz-box-shadow: inset 0 0 0 2px #337AB7 !important;
        box-shadow: inset 0 0 0 2px #337AB7 !important;
        border: none;
    }
    .trophy{
        width:8%;
    }
    .sales-target {
        color: #007bff;
        font-weight: bold;
        font-size: .9rem;
        padding-top: 3px;
        position: absolute;
        text-align: center;
        width: 100%;
        margin: auto;
        left: 5%;
    }
    .trophy-check{
        font-size:1.5em;
    }
</style>
@endsection
@section('content')
    <div class="card card-login mx-auto mt-5">

        <div class="card-header">{{__('translation.User segments')}}</div>

        <div class="card-body">
            <div class="form-row">
                <div class="alert alert-info w-100 mt-2">
                    {{__('translation.Dear customer, your current tier is , if you want to upgrade your account to a higher tier and get special discounts, all you have to do is increase your monthly sales.',['name'=>$user_level?$user_level->title:''])}}
                </div>
            </div>
            <div class="row text-center as7ab-current-level">
                <img src="{{$user_level?$user_level->icon:asset('images/levels/5.png')}}" style="margin:0 auto;"><br>
                <h4 class="w-100 pt-2">{{$user_level?$user_level->title:''}}</h4>
            </div>
            @foreach($levels as $level)
                @php
                    $width=0;
                    $min_width=null;
                    if ($level->id == $user_level->id){
                        $width=(auth()->user()->amount_orders / $level->amount) * 100;
                        $min_width='min-width:15% !important;';
                    }elseif ($user_level-> sort >= $level->sort){
                        $width=100;
                    }

                @endphp
                <div class="form-row mt-4">
                    <img src="{{$level->icon}}" class="trophy pull-right">
                    <div class="progress  mt-2 @if($level->id == $user_level->id || $user_level-> sort >= $level->sort) sales-progress    @endif">
                        <div class="progress-bar" role="progressbar"
                             data-valuenow="{{$user_level-> sort >= $level->sort ?auth()->user()->amount_orders:0}}"
                             aria-valuenow="{{$user_level-> sort >= $level->sort ?auth()->user()->amount_orders:0}}" aria-valuemin="10" aria-valuemax="{{$level->amount}}" style="width: {{$width}}%;{{$min_width}} ">
                            @if($level->id == $user_level->id)
                                <span class="current_sales">{{get_helper_price(auth()->user()->amount_orders,true)}}</span>
                                <span class="target_sales d-none">{{get_helper_price($level->amount,true)}}</span>

                            @elseif($user_level-> sort >= $level->sort)
                                <span class="current_sales">{{get_helper_price($level->amount,true)}}</span>
                                <span class="target_sales d-none">{{get_helper_price($level->amount,true)}}</span>
                            @else

                                <div class="sales-target w-100 text-center">{{get_helper_price($level->amount,true)}}</div>
                            @endif


                        </div>
                    </div>

                    <div class="pull-left trophy text-success trophy-check"></div>
                </div>
            @endforeach


        </div>

    </div>
@endsection
@section('script')

@endsection
