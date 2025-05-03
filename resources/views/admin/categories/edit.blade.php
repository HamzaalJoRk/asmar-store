@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('site.home') @endslot
        @slot('title') @lang('categories.categories') @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <a href="{{ route('ad.categories.index') }}" class="btn btn-soft-primary">
                        @lang('Back')
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ad.categories.update', $category) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('categories.name')<span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                           class="form-control"
                                           value="{{ old('name', $category->name) }}"
                                           placeholder="@lang('categories.name')">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>@lang('categories.image_current')</label><br>
                                <img src="{{ asset('storage/'.$category->image) }}"
                                     alt="" width="80">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('categories.image')<span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('categories.active')<span class="text-danger">*</span></label>
                                    <select name="active" class="form-control">
                                        <option value="1" {{ old('active', $category->active)==1?'selected':'' }}>
                                            @lang('Active')
                                        </option>
                                        <option value="0" {{ old('active', $category->active)==0?'selected':'' }}>
                                            @lang('Inactive')
                                        </option>
                                    </select>
                                    @error('active')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> @lang('Edit')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
