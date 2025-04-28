{{-- @if (auth()->user()->hasPermission('update_orders'))
<a href="{{ route('ad.orders.edit', $order->id) }}" class="btn btn-warning btn-sm" title="@lang('Edit')"><i
        class="fa fa-edit"></i> </a>
@endif
@if (auth()->user()->hasPermission('delete_orders'))
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="@lang('Delete')"
    data-bs-target="#delete{{ $order->id }}">
    <i class="fa fa-trash"></i>
</button>
@endif --}}

@if ($order->status == 'pending')
    <a href="{{ route('ad.orders.change_status', encrypt($order->id)) }}"
        title="{{ __('change') }} {{ $order->status == 'pending' ? trans('approved') : trans('pending') }} ">
        <button id="status-btn" class="btn btn-sm btn-{{ $order->status == 'pending' ? 'info' : 'success' }}">
            <i class='fa fa-toggle-off'></i>
            {{ __($order->status()) }}
        </button>
    </a>
@elseif($order->status == 'approved')
    <button id="status-btn" class="btn btn-sm btn-{{ $order->status == 'approved' ? 'success' : 'danger' }}"
        data-bs-toggle="modal" data-bs-target="#change{{ $order->id }}"
        title="{{ __('change') }} {{ $order->status == 'approved' ? trans('canceled') : trans('approved') }} ">
        {{ __($order->status()) }}
        <i class='fa fa-toggle-on'></i>
    </button>
@else
    <a href="{{ route('ad.orders.change_status', encrypt($order->id)) }}"
        title="{{ __('change') }} {{ $order->status == 'canceled' ? trans('approved') : trans('canceled') }} ">
        <button id="status-btn" class="btn btn-sm btn-{{ $order->status == 'approved' ? 'success' : 'danger' }}">
            {{ __($order->status()) }}
            <i class='fa fa-exclamation-circle'></i>
        </button>
    </a>
    <div title="{{ $order->reason ?? ' ' }}">
        {{ __('By') }} ({{ $order->canceledBy?->name }})
    </div>
@endif
{{-- modal delete --}}
<div class="modal fade" id="delete{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('Delete')
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ad.orders.destroy', $order->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p> @lang('titleDel') <span>{{ $order['name'] }}</span> </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{ __('save') }}</button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal delete --}}

{{-- modal change --}}
<div class="modal fade" id="change{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('change-reson')
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ad.orders.cancel_status', encrypt($order->id)) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <p> @lang('orders.invoice_no') <span>{{ $order['invoice_no'] }}</span> </p>
                    <div class="form-group">
                        <input type="hidden" name="status" value="{{ $order->status }}" id=""
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>@lang('change-reson')<span class="text-danger">*</span></label>
                        <textarea name="reason" class="form-control">
                            {!! old('reason', $order->reason) !!}
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
</div>
{{-- end modal change --}}
