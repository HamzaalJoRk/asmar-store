@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
        @lang('site.home')
        @endslot
        @slot('title')
        @lang('transactions.transactions')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.transactions.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.transactions.update',$transaction->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.invoice_no')<span class="text-danger">*</span></label>
                                    <input type="number" name="invoice_no" class="form-control" value="{{ old('invoice_no',$transaction->invoice_no) }}" placeholder="@lang('transactions.invoice_no')" >
                                    @error('invoice_no')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.account_number')<span class="text-danger">*</span></label>
                                    <input type="number" name="account_number" class="form-control" value="{{ old('account_number',$transaction->account_number) }}" placeholder="@lang('transactions.account_number')" >
                                    @error('account_number')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.account_name')<span class="text-danger">*</span></label>
                                    <input type="text" name="account_name" class="form-control" value="{{ old('account_name',$transaction->account_name) }}" placeholder="@lang('transactions.account_name')" >
                                    @error('account_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.date_at')<span class="text-danger">*</span></label>
                                    <input type="date" name="date_at" class="form-control" value="{{ old('date_at',$transaction->date_at->format('Y-m-d')) }}" placeholder="@lang('transactions.date_at')" >
                                    @error('date_at')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.status')<span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option  disabled selected>{{ __('select') }}</option>
                                        <option value="pending" {{ old('status',$transaction->status) == 'pending' ? 'selected' : null }}>{{ __('pending') }}</option>
                                        <option value="approved" {{ old('status',$transaction->status) == 'approved' ? 'selected' : null }}>{{ __('approved') }}</option>
                                        <option value="canceled" {{ old('status',$transaction->status) == 'canceled' ? 'selected' : null }}>{{ __('canceled') }}</option>
                                    </select>
                                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> --}}
                            <input type="hidden" value="{{ $transaction->status }}" name="status" >
                            <input type="hidden" value="{{ $transaction->reason }}" name="reason" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.banks')<span class="text-danger">*</span></label>
                                    <select name="bank_id" class="form-control">
                                        <option  disabled selected>{{ __('select') }}</option>
                                        @forelse ($banks as $bank)
                                        <option value="{{ $bank->id }}" {{ old('bank_id',$transaction->bank?->id)==$bank->id?'selected':null }}>
                                                {{ $bank->title }}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('bank_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.users')<span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control">
                                        <option  disabled selected>{{ __('select') }}</option>
                                        @forelse ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id',$transaction->user?->id)==$user->id?'selected':null }}>
                                                {{ $user->name }}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.currencys')<span class="text-danger">*</span></label>
                                    <select name="currency_id" class="form-control">
                                        <option  disabled selected>{{ __('select') }}</option>
                                        @forelse ($currencys as $currency)
                                        <option value="{{ $currency->id }}" {{ old('currency_id',$transaction->currency->id)==$currency->id?'selected':null }}>
                                                {{ $currency->currency }}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('currency_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('transactions.final_total')<span class="text-danger">*</span></label>
                                    <input type="number" name="final_total" class="form-control" value="{{ old('final_total',$transaction->final_total) }}" placeholder="@lang('transactions.final_total')" >
                                    @error('final_total')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('transactions.details')<span class="text-danger">*</span></label>
                                    <textarea name="details" class="form-control">
                                       {!! old('details',$transaction->details) !!}
                                    </textarea>
                                    @error('details')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('transactions.reason')</label>
                                    <textarea name="reason" class="form-control">
                                        {!! old('reason',$transaction->reason) !!}
                                    </textarea>
                                    @error('reason')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> --}}

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
@endsection
