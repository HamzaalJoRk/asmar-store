@extends('front.layouts.master')

@section('title') @lang('translation.create transactions')  @endsection
@section('styles')

    <style>
        .card-login {
            max-width: 25rem;
        }
        span#amount {
            min-height: 36.5px;
        }
        button.btn.btn-primary.btn-block {
            width: 50%;
            margin: auto;
            margin-top: 10px;
        }
    </style>
    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <style>
            body{
                direction: rtl;
                text-align: right;
            }

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
        <div class="card card-login mx-auto mt-5">
            <div class="card-body ">
                <div class="alert alert-info mt-2"><li class="mt-2">يرجى إرسال المبلغ المطلوب إلى العنوان:<br>
                        <strong>
                            <a href="#" onclick="return copyToClipboard(this);">
                                {{$bank->address}}
                                <i class="fa fa-copy pr-1"></i></a>
                        </strong>
                        <br>
                        ومن ثم التبليغ عن الدفعة هنا
                    </li>
                    <li class="mt-2">عند ايداعك أي مبلغ من خلال بوابة الدفع هذه سيتم اقتطاع
                        <b>{{$bank->fee_percentage}}%</b> عمولة من مبلغ الحوالة</li>
                    <li class="mt-2"> الحد الأدنى للإرسال هو  {{get_helper_price($bank->minimum_payment,true)}} </li>
                    <li class="mt-2">الحد القصي للإرسال هو  {{get_helper_price($bank->limit_payment,true)}}</li>
                </div>
                <div class="alert alert-warning mt-2">استلام المبالغ من الساعه 10 صباحاً حتى 7 مساء<br>
                    <br>  يوم الجمعة إجازة</div>
                <form method="post" class="addpayment" action="{{route('front.transactions.store')}}">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="name">اسم صاحب الحساب</label>
                                <input type="text"  value="{{old('name')}}"  name="name" id="name" class="form-control" placeholder="اسم صاحب الحساب">
                                @error('name')
                                    <br><span class="alert alert-danger" >
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="address">حساب المرسل</label>
                                <input type="text" value="{{old('address')}}" name="address" id="address" class="form-control" placeholder="رقم الحساب / البريد الالكتروني / عنوان محفظة المرسل">
                                @error('address')
                                    <br><span class="alert alert-danger" >
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col">
                                <label class="form-label">العملة</label>
                                <select class="form-control select2" name="currency_id">
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}" @if(old('currency_id') == $currency->id)  selected @endif>{{$currency->code}}</option>
                                    @endforeach
                                </select>
                                @error('address')
                                <br><span class="alert alert-danger" >
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="original_amount">المبلغ</label>
                                <input name="original_amount" value="{{old('original_amount')}}"  required="" class="form-control" id="original_amount" step="any" type="number">
                                @error('original_amount')
                                    <br><span class="alert alert-danger" >
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col">
                                <label for="amount">قيمة الرصيد المضاف</label>
                                <span   class="form-control" id="amount" >

                                </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="date">التاريخ</label>
                                <input type="datetime-local" required="" autocomplete="off" name="date" id="date" class="form-control" placeholder="التاريخ" value=" {{old('date')}}">
                                @error('date')
                                    <br><span class="alert alert-danger" >
                                        {{$message}}
                                    </span>
                                @enderror
                                <input type="hidden" required="" name="payment_gateway" value="{{$bank->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details">ملاحظات</label>
                            <textarea name="details"  class="form-control" id="details" placeholder="أدخل الملاحظات">
                                    {{old('details')}}
                            </textarea>
                            @error('details')
                                <br><span class="alert alert-danger" >
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">

                        <button type="submit" name="add" class="btn btn-primary btn-block">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function copyToClipboard(element) {
        var aux = document.createElement("div");
        aux.setAttribute("contentEditable", true);
        aux.innerHTML = element.innerHTML;
        aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)");
        document.body.appendChild(aux);
        aux.focus();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    @if(old('original_amount'))
        getFeeAmount({{old('original_amount')}});
    @endif
    $('#original_amount').on('input', function(){
        var element_amount=$(this).val();
        getFeeAmount(element_amount);
    });

    function getFeeAmount(element_amount){
        var fee_percentage={{$bank->fee_percentage}};

        var amount=element_amount - ((fee_percentage / 100 )*element_amount);


        $('#amount').text(amount);
    }
</script>
@endsection
