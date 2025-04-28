@if (auth()->user()->hasPermission('update_levels'))
<a href="{{ route('ad.levels.edit', $level->id) }}" class="btn btn-warning btn-sm" title="@lang('Edit')"><i
        class="fa fa-edit"></i> </a>
@endif
@if (auth()->user()->hasPermission('delete_levels'))
    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="@lang('Delete')"
        data-bs-target="#delete{{ $level->id }}">
        <i class="fa fa-trash"></i>
    </button>
@endif
{{-- modal delete --}}
<div class="modal fade" id="delete{{ $level->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('Delete')
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ad.levels.destroy', $level->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p> @lang('Delete') <span>{{ $level['name'] }}</span> </p>
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

