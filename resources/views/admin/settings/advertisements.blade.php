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
    @lang('settings.settings')
    @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('ad.settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> @lang('translation.icon')</label>
                                    <input type="file" class="form-control" name="image">
                                    @if($advertisement && $advertisement->getFirstMediaUrl('image'))
                                        <div class="img-old mt-2">
                                            <img src="{{ $advertisement->getFirstMediaUrl('image') }}" width="120">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.description')</label>
                                    <textarea class="form-control" name="description"
                                        rows="3">{{ old('description', $advertisement->description ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('translation.status')</label>
                                    <select name="actve" class="form-control">
                                        <option value="1" {{ (isset($advertisement) && $advertisement->actve) ? 'selected' : '' }}>@lang('translation.active')</option>
                                        <option value="0" {{ (isset($advertisement) && !$advertisement->actve) ? 'selected' : '' }}>@lang('translation.inactive')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                    @lang('Edit')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection