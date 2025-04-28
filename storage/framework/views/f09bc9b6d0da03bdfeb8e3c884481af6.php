<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">  <?php echo app('translator')->get('translation.AdminList'); ?> </h4>


            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                    <li class="breadcrumb-item active"><?php echo app('translator')->get('translation.AdminList'); ?></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1"><?php echo app('translator')->get('translation.AdminList'); ?></h5>

                        <div class="flex-shrink-0">
                            <a  href="<?php echo e(url('ad/games/create?action=addGame')); ?>" class="btn btn-soft-primary" >
                                <?php echo app('translator')->get('translation.add'); ?>

                            </a>
                        </div>










                    <!-- Button trigger modal -->


                    <!-- Modal -->













                    <!-- Button trigger modal -->


                    <!-- Modal -->
















                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle nowrap">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('translation.id'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.icon'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.background'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.icon_coins'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.slug'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.title'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.keywords'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.name_currency'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.need_name_player'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.need_id_player'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.price_qty'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.quantity '); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.min_qty '); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.is_active '); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.is_show '); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.have_packages'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=0
                        ?>
                        <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e(++$i); ?></th>

                                <th scope="row"><img src='<?php if($game->getFirstMedia('icon')): ?> <?php echo e($game->getFirstMedia('icon')->getUrl()); ?> <?php endif; ?>' width="50px" height="50px"></th>
                                <th scope="row"><img src='<?php if($game->getFirstMedia('background')): ?> <?php echo e($game->getFirstMedia('background')->getUrl()); ?> <?php endif; ?>' width="50px" height="50px"></th>
                                <th scope="row"><img src='<?php if($game->getFirstMedia('icon_coins')): ?> <?php echo e($game->getFirstMedia('icon_coins')->getUrl()); ?> <?php endif; ?>' width="50px" height="50px"></th>
                                <th scope="row"><?php echo e($game->slug); ?></th>
                                <th scope="row"><?php echo e($game->title); ?></th>
                                <th scope="row"><?php echo e($game->translate(app()->getLocale())->keywords); ?></th>
                                <th scope="row"><?php echo e($game->name_currency); ?></th>
                                <th scope="row"><?php echo e($game->name_player_string); ?></th>
                                <th scope="row"><?php echo e($game->id_player_string); ?></th>
                                <th scope="row"><?php echo e($game->price_qty); ?></th>
                                <th scope="row"><?php echo e($game->quantity); ?></th>
                                <th scope="row"><?php echo e($game->min_qty); ?></th>
                                <th scope="row"><?php echo e($game->active_string); ?></th>
                                <th scope="row"><?php echo e($game->is_show_string); ?></th>
                                <th scope="row"><?php echo e($game->have_packages_string); ?></th>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('translation.view'); ?>">
                                            <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                        </li>


                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('translation.edit'); ?>">
                                                <a href="<?php echo e(route('ad.games.edit',$game['id'])); ?>"  class="btn btn-sm btn-soft-primary"  >
                                                    <i class="mdi mdi-pencil-outline"></i>

                                                </a>
                                            </li>




                                            <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" title="<?php echo app('translator')->get('translation.delete'); ?>" data-bs-target="#gameDelete_<?php echo e($game['id']); ?>">
                                                <i class="mdi mdi-delete-outline"></i>
                                            </button>

                                        <?php if($game->have_packages==1): ?>
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('translation.ViewPackage'); ?>">
                                                <a href="<?php echo e(route('ad.games.packages',$game->id)); ?>" class="btn btn-sm btn-soft-success"><i class="mdi mdi-eye-outline"></i></a>
                                            </li>


                                        <?php endif; ?>




                                    </ul>
                                </td>
                            </tr>

                            <!-- model edit-->
                            <div class="modal fade" id="gameDelete_<?php echo e($game['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('translation.delete'); ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php echo e(route('ad.games.destroy',$game['id'])); ?>" method="POST">

                                            <div class="modal-body">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <p> <?php echo app('translator')->get('translation.titleDel'); ?> <span><?php echo e($game['slug']); ?></span> </p>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger"><?php echo app('translator')->get('translation.delete'); ?></button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('translation.close'); ?></button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->


                <div class="row justify-content-between align-items-center">
                    <div class="col-auto me-auto">
                        <p class="text-muted mb-0">Showing <b>1</b> to <b>12</b> of <b>45</b> entries</p>
                    </div>
                    <div class="col-auto">
                        <div class="card d-inline-block ms-auto mb-0">
                            <div class="card-body p-2">
                                <nav aria-label="Page navigation example" class="mb-0">
                                    <ul class="pagination mb-0">
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">...</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">12</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
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
<?php /**PATH D:\work\D-sherif\game-shop\resources\views/Admin/games/view.blade.php ENDPATH**/ ?>