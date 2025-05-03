{{-- resources/views/admin/categories/games.blade.php --}}
@extends('layouts.master')

@section('title')
    {{ $category->name }} — @lang('categories.view_products')
@endsection

@section('content')
    @component('components.breadcrumb')
    @slot('li_1') @lang('site.home') @endslot
    @slot('li_2') @lang('categories.categories') @endslot
    @slot('title') {{ $category->name }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                {{-- شريط الأزرار --}}
                <div class="card-body border-bottom d-flex justify-content-between">
                    <div>
                        <a href="{{ route('ad.games.create', ['category_id' => $category->id]) }}"
                            class="btn btn-soft-primary">
                            <i class="fa fa-plus"></i> @lang('Add')
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('ad.categories.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> @lang('back')
                        </a>
                    </div>
                </div>

                {{-- محتوى القائمة --}}
                <div class="card-body">
                    @if($games->count())
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('games.title')</th>
                                        <th>@lang('games.is_show')</th>
                                        <th>@lang('Created_at')</th>
                                        <th>@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($games as $i => $game)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $game->title }}</td>
                                            <td>{{ $game->is_show_string }}</td>
                                            <td>{{ $game->created_at->diffForHumans() }}</td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="@lang('translation.view')">
                                                        <a href="{{route('front.game.show', $game['slug'])}}"
                                                            class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>


                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="@lang('translation.edit')">
                                                        <a href="{{route('ad.games.edit', $game['id'])}}"
                                                            class="btn btn-sm btn-soft-primary">
                                                            <i class="mdi mdi-pencil-outline"></i>

                                                        </a>
                                                    </li>




                                                    <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal"
                                                        title="@lang('translation.delete')"
                                                        data-bs-target="#gameDelete_{{$game['id']}}">
                                                        <i class="mdi mdi-delete-outline"></i>
                                                    </button>

                                                    @if($game->have_packages == 1)
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="@lang('translation.ViewPackage')">
                                                            <a href="{{route('ad.games.packages', $game->id)}}"
                                                                class="btn btn-sm btn-soft-success"><i
                                                                    class="mdi mdi-eye-outline"></i></a>
                                                        </li>


                                                    @endif




                                                </ul>
                                            </td>
                                        </tr>
                                        <!-- model edit-->
                                        <div class="modal fade" id="gameDelete_{{$game['id']}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            @lang('translation.delete')</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('ad.games.destroy', $game['id'])}}" method="POST">

                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('delete')
                                                            <p> @lang('translation.titleDel') <span>{{$game['slug']}}</span> </p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-danger">@lang('translation.delete')</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">@lang('translation.close')</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="float-right">
                            {!! $games->links() !!}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            @lang('games.no_found')
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection