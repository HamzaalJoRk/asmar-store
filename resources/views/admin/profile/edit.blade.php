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
           @lang('users.edit_profile')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('ad.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('users.name')<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}"  >
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{--email--}}
                                <div class="form-group">
                                    <label>@lang('users.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{--phone--}}
                              <div class="form-group">
                                  <label>@lang('users.phone')<span class="text-danger">*</span></label>
                                  <input type="tel" name="phone" class="form-control" value="{{ old('phone',auth()->user()->phone) }}" placeholder="phone"
                                      maxlength="11" minlength="11"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                  @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                              </div>
                          </div>
                          <div class="col-md-6">
                            {{--image--}}
                            <div class="form-group">
                                <label>@lang('users.image') <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control img" accept="image/*">
                                <div class="col-md-4">
                                    @if(auth()->user()->image)
                                      <img src="{{display_file(auth()->user()->image)}}" alt="{{ auth()->user()->name }}" class="img-thumbnail img-preview" width="200px">
                                    @else
                                      <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                                    @endif
                                </div>
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
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
