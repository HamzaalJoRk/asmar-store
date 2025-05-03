{{-- زرّ عرض المنتجات --}}
<a href="{{ route('ad.categories.games.index', $category->id) }}"
   class="btn btn-info btn-sm"
   title="@lang('categories.view_products')">
    <i class="fa fa-box"></i>
</a>

{{-- زرّ التعديل --}}
<a href="{{ route('ad.categories.edit', $category->id) }}"
   class="btn btn-warning btn-sm"
   title="@lang('categories.edit')">
    <i class="fa fa-edit"></i>
</a>

{{-- زرّ الحذف --}}
<button type="button"
        class="btn btn-sm btn-danger"
        data-bs-toggle="modal"
        title="@lang('categories.delete')"
        data-bs-target="#delete{{ $category->id }}">
    <i class="fa fa-trash"></i>
</button>

{{-- مودال التأكيد للحذف --}}
<div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-labelledby="deleteLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel{{ $category->id }}">@lang('categories.delete')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('categories.cancel')"></button>
            </div>
            <form action="{{ route('ad.categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>@lang('categories.titleDel') <strong>{{ $category->name }}</strong>؟</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">@lang('categories.save')</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('categories.cancel')</button>
                </div>
            </form>
        </div>
    </div>
</div>
