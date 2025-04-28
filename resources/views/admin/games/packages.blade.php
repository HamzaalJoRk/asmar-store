@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @lang('translation.Dashboards') @endslot
        @slot('title') @lang('translation.packages') @endslot
    @endcomponent


    <!-- end row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">@lang('translation.packages')</h5>
                        @can('add')
                            <div class="flex-shrink-0">
                                <a  href="{{url('ad/games/create?action=addGame')}}" class="btn btn-soft-primary" >
                                    @lang('translation.add')

                                </a>
                            </div>
                        @endcan


                        <!-- Button trigger modal -->


                        <!-- Modal -->
















                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle nowrap">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('translation.price')</th>
                                <th scope="col">@lang('translation.quantity')</th>
                                <th scope="col">@lang('translation.is_active')</th>
                                <th scope="col">@lang('translation.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0
                            @endphp
                            @foreach($packages as $package)
                                <tr>
                                    <th scope="row">{{++$i}}</th>
                                    <th scope="row">{{$package->price}}</th>
                                    <th scope="row">{{$package->quantity}}</th>
                                    <th scope="row">{{$package->active_string}}</th>
                                    <td>
                                        <ul class="list-unstyled hstack gap-1 mb-0">



                                                    <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" title="@lang('translation.delete')" data-bs-target="#gamePackageEdit_{{$package['id']}}">
                                                        <i class="mdi mdi-pencil-outline"></i>

                                                    </button>



                                                    <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" title="@lang('translation.delete')" data-bs-target="#gamePackageDelete_{{$package['id']}}">
                                                        <i class="mdi mdi-delete-outline"></i>

                                                    </button>







                                        </ul>
                                    </td>
                                </tr>

                                <!-- model edit-->
                                <div class="modal fade" id="gamePackageEdit_{{$package['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('translation.delete')</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{route('ad.games.packages.update',$package['id'])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$package->game->id}}">
                                                      <div class="row"  >
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="validationCustom02" class="form-label">  @lang('translation.price_qty')</label>
                                                                    <input type="number" class="form-control" id="validationCustom02" placeholder="price_qty"
                                                                            name="price_qty_package" step="any" value="{{$package->price}}">
                                                                    <div class="valid-feedback">
                                                                        @lang('translation.validPrice_qty')
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="validationCustom02" class="form-label">  @lang('translation.quantity')</label>
                                                                    <input type="number" class="form-control" id="validationCustom02" placeholder="quantity_package"
                                                                            name="quantity_package" value="{{$package->quantity}}">
                                                                    <div class="valid-feedback">
                                                                        @lang('translation.validQuantity')
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        @lang('translation.invalidQuantity').
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                       <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="validationCustom03" class="form-label">@lang('translation.Status')</label>
                                                                <select class="form-select" id="validationCustom03"  name="is_active_package">
                                                                    <option selected disabled value=""> @lang('translation.Choose')</option>
                                                                    <option @if($package->is_active=='1') value="1" selected  @endif > @lang('translation.active') </option>
                                                                    <option @if($package->is_active=='0') value="0" selected  @endif > @lang('translation.inactive') </option>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    @lang('translation.validStatus')
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    @lang('translation.invalidStatus')

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-soft-success">@lang('translation.update')</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translation.close')</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="gamePackageDelete_{{$package['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('translation.delete')</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('ad.games.packages.delete',$package['id'])}}" method="POST">
                                                 @method('DELETE')
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$package->game->id}}">
                                                    <p> @lang('translation.titleDel') <span>{{$package->game->slug}}</span> </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">@lang('translation.delete')</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translation.close')</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- Button trigger modal -->



                </div>
            </div><!--end card-->
        </div><!--end col-->

    </div><!--end row-->
    <!-- end row -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <!-- Transaction Modal -->

    <!-- end modal -->


@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>


@endsection
