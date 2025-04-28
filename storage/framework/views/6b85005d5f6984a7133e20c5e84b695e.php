


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1"><?php echo app('translator')->get('translation.Games'); ?></h5>

                        <div class="flex-shrink-0">
                            <a  href="<?php echo e(url('ad/games/create?action=addGame')); ?>" class="btn btn-soft-primary" >
                                <?php echo app('translator')->get('translation.Add'); ?>

                            </a>
                        </div>
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
                            <th scope="col"><?php echo app('translator')->get('translation.background_package'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.slug'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.title'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.keywords'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.name_currency'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.need_name_player'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.need_id_player'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.price_qty'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.is_active'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('translation.is_show'); ?></th>
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
                                <th scope="row"><img src='<?php if($game->getFirstMedia('background_package')): ?> <?php echo e($game->getFirstMedia('background_package')->getUrl()); ?> <?php endif; ?>' width="50px" height="50px"></th>
                                <th scope="row"><?php echo e($game->slug); ?></th>
                                <th scope="row"><?php echo e($game->title); ?></th>
                                <th scope="row"><?php echo e($game->keywords); ?></th>
                                <th scope="row"><?php echo e($game->name_currency); ?></th>
                                <th scope="row"><?php echo e($game->name_player_string); ?></th>
                                <th scope="row"><?php echo e($game->id_player_string); ?></th>
                                <th scope="row"><?php echo e(number_format($game->price_qty,10)); ?></th>
                                <th scope="row"><?php echo e($game->active_string); ?></th>
                                <th scope="row"><?php echo e($game->is_show_string); ?></th>
                                <th scope="row"><?php echo e($game->have_packages_string); ?></th>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('translation.view'); ?>">
                                            <a href="<?php echo e(route('front.game.show',$game['slug'])); ?>" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
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
                        <tfoot>
                        <tr>
                            <th colspan="12">
                                <div class="float-right">
                                    <?php echo $games->appends(request()->all())->links(); ?>

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
<?php /**PATH F:\hamza\new-store\resources\views/admin/games/view.blade.php ENDPATH**/ ?>