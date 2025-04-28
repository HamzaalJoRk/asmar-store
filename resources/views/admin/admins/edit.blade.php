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
        @lang('admins.admins')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.admins.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.admins.update',$admin->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                {{-- name --}}
                                <div class="form-group">
                                    <label>@lang('admins.name')<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name',$admin->name) }}"
                                        placeholder="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- email --}}
                                <div class="form-group">
                                    <label>@lang('admins.email')<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email',$admin->email) }}"
                                        placeholder="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{--phone--}}
                              <div class="form-group">
                                  <label>@lang('users.phone')<span class="text-danger">*</span></label>
                                  <input type="tel" name="phone" class="form-control" value="{{ old('phone',$admin->phone) }}" placeholder="phone"
                                      maxlength="11" minlength="11"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                  @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                                {{--status--}}
                                <div class="form-group">
                                    <label>@lang('admins.status')<span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ old('status',$admin->status) == 'active' ? 'selected' : null }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status',$admin->status) == 'inactive' ? 'selected' : null }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- password --}}
                                <div class="form-group">
                                    <label>@lang('admins.password')<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                        value="{{ old('password') }}" placeholder="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{-- password_confirmation --}}
                                <div class="form-group">
                                    <label>@lang('admins.password_confirmation')<span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        value="{{ old('password_confirmation') }}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('admins.image') }}</label>
                                        <input class="form-control img" name="image"  type="file" accept="image/*" >
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($admin->image)
                                        <img src="{{display_file($admin->image)}}" alt="{{ $admin->name }}" class="img-thumbnail img-preview" width="200px">
                                    @else
                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">@lang('admins.permissions')</label>
                                        <div class="inp-holder mb-1">
                                            <label for="name">{{ __('admins.selectall') }}</label>
                                            <input type="checkbox"  id="selectall" >
                                        </div>
                                        <div class="table-holder">
                                            {{-- <label for="">@lang('roles.permissions')<span class="text-danger">*</span> </label> --}}
                                            <div class="table-responsive">
                                                <table class="table main-table">
                                                    <thead>
                                                        <tr>
                                                            <th>@lang('roles.model')</th>
                                                            <th>{{ __('admins.selectall') }}</th>
                                                            @foreach($permissionMaps as $key => $value)
                                                              <th>@lang('site.' . $value)
                                                                <div style="display:inline-block;">
                                                                      <label class="m-0">
                                                                          <input type="checkbox" value=""  onclick="SelectAll(this)"  class="side-roles" id="side-roles">
                                                                      </label>
                                                                  </div>
                                                              </th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($models as $model)
                                                            <tr>
                                                                <td>@lang($model . '.' . $model)</td>
                                                                <td>
                                                                    <div class="animated-checkbox mx-2" style="display:inline-block;">
                                                                        <label class="m-0">
                                                                            <input type="checkbox" value=""  class="all-roles">
                                                                            <span class="label-text">{{ __('admins.all') }}</span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                @foreach ($permissionMaps as $permissionMap)
                                                                    <td>
                                                                        <div class="animated-checkbox mx-2" style="display:inline-block;">
                                                                            <label class="m-0">
                                                                                <input type="checkbox" value="{{ $permissionMap . '_' . $model }}" name="permissions[]"
                                                                                {{ $admin->hasPermission($permissionMap . '_' . $model) ? 'checked' : '' }} class="role">
                                                                                <span class="label-text">@lang('site.' . $permissionMap) @lang($model . '.' . $model)</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @error('permissions')
                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                            @enderror
                                            <!-- end of table -->
                                        </div>
                                    </div>
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

<script>
    $(document).ready(function() {
        $('#selectall').click(function(event) {  //on click
            // console.log('hello');
            if(this.checked) { // check select status
                $('.role').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "role"
                });
            }else{
                $('.role').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "role"
                });
            }
            var chkArray = [];
            $("input[name='check[]']:checked").map(function() {
                chkArray.push(this.value);
            }).get();
            var selected;
            selected = chkArray.join(',') + ",";
            // if(selected.length > 1){
            //     alert('هل تريد تحديد الكل?');
            // } else { alert(' تحديد الكل'); }
        });
    });
</script>
<script>
        $(function () {
        $(document).on('change', '.all-roles', function () {
            $(this).parents('tr').find('input[type="checkbox"]').prop('checked', this.checked);
        });
        $(document).on('change', '.role', function () {
            if (!this.checked) {
                $(this).parents('tr').find('.all-roles').prop('checked', this.checked);
            }
            // else{
            //     $(this).parents('tr').find('.all-roles').prop('checked', this.checked);
            // }
        });

    });//end of document ready

</script>
<script>
   function SelectAll(obj) {
       var table = $(obj).closest('table');
       var th_s = table.find('th');
       var current_th = $(obj).closest('th');
       var columnIndex = th_s.index(current_th) + 1;
       table.find('td:nth-child(' + (columnIndex) + ') input').prop("checked", obj.checked);
   }
</script>
@endsection
