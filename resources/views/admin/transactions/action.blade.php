@if (auth()->user()->hasPermission('update_transactions'))
<a href="{{ route('ad.transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm" title="@lang('Edit')"><i
        class="fa fa-edit"></i> </a>
@endif
@if (auth()->user()->hasPermission('delete_transactions'))
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="@lang('Delete')"
    data-bs-target="#delete{{ $transaction->id }}">
    <i class="fa fa-trash"></i>
</button>
@endif

@if ($transaction->status == 'pending')
    <a href="{{ route('ad.transactions.change_status', encrypt($transaction->id)) }}"
        title="{{ __('change') }} {{ $transaction->status == 'pending' ? trans('approved') : trans('pending') }} ">
        <button id="status-btn" class="btn btn-sm btn-{{ $transaction->status == 'pending' ? 'info' : 'success' }}">
            <i class='fa fa-toggle-off'></i>
            {{ __($transaction->status()) }}
        </button>
    </a>
@elseif($transaction->status == 'approved')
    <button id="status-btn" class="btn btn-sm btn-{{ $transaction->status == 'approved' ? 'success' : 'danger' }}"
        data-bs-toggle="modal" data-bs-target="#change{{ $transaction->id }}"
        title="{{ __('change') }} {{ $transaction->status == 'approved' ? trans('canceled') : trans('approved') }} ">
        {{ __($transaction->status()) }}
        <i class='fa fa-toggle-on'></i>
    </button>
@else
    <a href="{{ route('ad.transactions.change_status', encrypt($transaction->id)) }}"
        title="{{ __('change') }} {{ $transaction->status == 'canceled' ? trans('approved') : trans('canceled') }} ">
        <button id="status-btn" class="btn btn-sm btn-{{ $transaction->status == 'approved' ? 'success' : 'danger' }}">
            {{ __($transaction->status()) }}
            <i class='fa fa-exclamation-circle'></i>
        </button>
    </a>
    <div title="{{ $transaction->reason ?? ' ' }}">
        {{ __('By') }} ({{ $transaction->canceledBy?->name }})
    </div>
@endif
{{-- modal delete --}}
<div class="modal fade" id="delete{{ $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('Delete')
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ad.transactions.destroy', $transaction->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p> @lang('titleDel') <span>{{ $transaction['name'] }}</span> </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{ __('save') }}</button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('cancel' .'accept') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal delete --}}

{{-- modal change --}}
{{-- <div class="modal fade" id="change{{ $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('change-reson')
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ad.transactions.cancel_status', encrypt($transaction->id)) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <p> @lang('transactions.invoice_no') <span>{{ $transaction['invoice_no'] }}</span> </p>
                    <div class="form-group">
                        <input type="hidden" name="status" value="{{ $transaction->status }}" id=""
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>@lang('change-reson')<span class="text-danger">*</span></label>
                        <textarea name="reason" class="form-control">
                            {!! old('reason', $transaction->reason) !!}
                        </textarea>
                        @error('reason')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{ __('change') }}</button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('cancel') }}</button>
                </div>
            </form>

        </div>
    </div>
</div> --}}
{{-- end modal change --}}
