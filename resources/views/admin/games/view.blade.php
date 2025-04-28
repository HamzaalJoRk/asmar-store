


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1">@lang('translation.Games')</h5>

                        <div class="flex-shrink-0">
                            <a  href="{{url('ad/games/create?action=addGame')}}" class="btn btn-soft-primary" >
                                @lang('translation.Add')

                            </a>
                        </div>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle nowrap">
                        <thead>
                        <tr>
                            <th scope="col">@lang('translation.id')</th>
                            <th scope="col">@lang('translation.icon')</th>
                            <th scope="col">@lang('translation.background')</th>
                            <th scope="col">@lang('translation.icon_coins')</th>
                            <!--<th scope="col">@lang('translation.background_package')</th>-->
                            <th scope="col">@lang('translation.slug')</th>
                            <th scope="col">@lang('translation.title')</th>
                            <th scope="col">@lang('translation.keywords')</th>
                            <th scope="col">@lang('translation.name_currency')</th>
                            <th scope="col">@lang('translation.need_name_player')</th>
                            <th scope="col">@lang('translation.need_id_player')</th>
                            <th scope="col">@lang('translation.price_qty')</th>
                            <th scope="col">@lang('translation.is_active')</th>
                            <th scope="col">@lang('translation.is_show')</th>
                            <th scope="col">@lang('translation.have_packages')</th>
                            <th scope="col">@lang('translation.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0
                        @endphp
                        @foreach($games as $game)
                            <tr>
                                <th scope="row">{{++$i}}</th>

                                <th scope="row"><img src='@if($game->getFirstMedia('icon')) {{$game->getFirstMedia('icon')->getUrl()}} @endif' width="50px" height="50px"></th>
                                <th scope="row"><img src='@if($game->getFirstMedia('background')) {{$game->getFirstMedia('background')->getUrl()}} @endif' width="50px" height="50px"></th>
                                <th scope="row"><img src='@if($game->getFirstMedia('icon_coins')) {{$game->getFirstMedia('icon_coins')->getUrl()}} @endif' width="50px" height="50px"></th>
                                <!--<th scope="row"><img src='@if($game->getFirstMedia('background_package')) {{$game->getFirstMedia('background_package')->getUrl()}} @endif' width="50px" height="50px"></th>-->
                                <th scope="row">{{$game->slug}}</th>
                                <th scope="row">{{$game->title}}</th>
                                <th scope="row">{{$game->keywords}}</th>
                                <th scope="row">{{$game->name_currency}}</th>
                                <th scope="row">{{$game->name_player_string}}</th>
                                <th scope="row">{{$game->id_player_string}}</th>
                                <th scope="row">{{number_format($game->price_qty,10)}}</th>
                                <th scope="row">{{$game->active_string}}</th>
                                <th scope="row">{{$game->is_show_string}}</th>
                                <th scope="row">{{$game->have_packages_string}}</th>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('translation.view')">
                                            <a href="{{route('front.game.show',$game['slug'])}}" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                        </li>


                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('translation.edit')">
                                                <a href="{{route('ad.games.edit',$game['id'])}}"  class="btn btn-sm btn-soft-primary"  >
                                                    <i class="mdi mdi-pencil-outline"></i>

                                                </a>
                                            </li>




                                            <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" title="@lang('translation.delete')" data-bs-target="#gameDelete_{{$game['id']}}">
                                                <i class="mdi mdi-delete-outline"></i>
                                            </button>

                                        @if($game->have_packages==1)
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('translation.ViewPackage')">
                                                <a href="{{route('ad.games.packages',$game->id)}}" class="btn btn-sm btn-soft-success"><i class="mdi mdi-eye-outline"></i></a>
                                            </li>


                                        @endif




                                    </ul>
                                </td>
                            </tr>

                            <!-- model edit-->
                            <div class="modal fade" id="gameDelete_{{$game['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('translation.delete')</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('ad.games.destroy',$game['id'])}}" method="POST">

                                            <div class="modal-body">
                                                @csrf
                                                @method('delete')
                                                <p> @lang('translation.titleDel') <span>{{$game['slug']}}</span> </p>

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
                        <tfoot>
                        <tr>
                            <th colspan="12">
                                <div class="float-right">
                                    {!! $games->appends(request()->all())->links() !!}
                                </div>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->



                <!--end row-->
            </div>
        </div><!--end card-->
    </div><!--end col-->

</div><!--end row-->
<!-- end row -->
<!-- Button trigger modal -->


<!-- Modal -->
<!-- Transaction Modal -->

<!-- end modal -->
