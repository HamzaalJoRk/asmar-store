<div class="btn-group">
    @if(auth()->user()->hasPermission('update_providers'))
        <a href="{{ route('ad.providers.edit', $provider) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>
        </a>
    @endif

    @if(auth()->user()->hasPermission('delete_providers'))
        <form action="{{ route('ad.providers.destroy', $provider) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" onclick="return confirm('@lang('Are you sure?')')">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    @endif
</div>