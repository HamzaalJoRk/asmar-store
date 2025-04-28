<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.packages'); ?> <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <!-- end row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1"><?php echo app('translator')->get('translation.packages'); ?></h5>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add')): ?>
                            <div class="flex-shrink-0">
                                <a  href="<?php echo e(url('ad/games/create?action=addGame')); ?>" class="btn btn-soft-primary" >
                                    <?php echo app('translator')->get('translation.add'); ?>

                                </a>
                            </div>
                        <?php endif; ?>


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
                                <th scope="col"><?php echo app('translator')->get('translation.price'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('translation.quantity'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('translation.is_active'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('translation.action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0
                            ?>
                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e(++$i); ?></th>
                                    <th scope="row"><?php echo e($package->price); ?></th>
                                    <th scope="row"><?php echo e($package->quantity); ?></th>
                                    <th scope="row"><?php echo e($package->active_string); ?></th>
                                    <td>
                                        <ul class="list-unstyled hstack gap-1 mb-0">



                                                    <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" title="<?php echo app('translator')->get('translation.delete'); ?>" data-bs-target="#gamePackageEdit_<?php echo e($package['id']); ?>">
                                                        <i class="mdi mdi-pencil-outline"></i>

                                                    </button>



                                                    <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" title="<?php echo app('translator')->get('translation.delete'); ?>" data-bs-target="#gamePackageDelete_<?php echo e($package['id']); ?>">
                                                        <i class="mdi mdi-delete-outline"></i>

                                                    </button>







                                        </ul>
                                    </td>
                                </tr>

                                <!-- model edit-->
                                <div class="modal fade" id="gamePackageEdit_<?php echo e($package['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('translation.delete'); ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="<?php echo e(route('ad.games.packages.update',$package['id'])); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo e($package->game->id); ?>">
                                                      <div class="row"  >
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                                                    <input type="number" class="form-control" id="validationCustom02" placeholder="price_qty"
                                                                            name="price_qty_package" step="any" value="<?php echo e($package->price); ?>">
                                                                    <div class="valid-feedback">
                                                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.quantity'); ?></label>
                                                                    <input type="number" class="form-control" id="validationCustom02" placeholder="quantity_package"
                                                                            name="quantity_package" value="<?php echo e($package->quantity); ?>">
                                                                    <div class="valid-feedback">
                                                                        <?php echo app('translator')->get('translation.validQuantity'); ?>
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        <?php echo app('translator')->get('translation.invalidQuantity'); ?>.
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                       <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                                                <select class="form-select" id="validationCustom03"  name="is_active_package">
                                                                    <option selected disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                                                    <option <?php if($package->is_active=='1'): ?> value="1" selected  <?php endif; ?> > <?php echo app('translator')->get('translation.active'); ?> </option>
                                                                    <option <?php if($package->is_active=='0'): ?> value="0" selected  <?php endif; ?> > <?php echo app('translator')->get('translation.inactive'); ?> </option>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    <?php echo app('translator')->get('translation.validStatus'); ?>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    <?php echo app('translator')->get('translation.invalidStatus'); ?>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-soft-success"><?php echo app('translator')->get('translation.update'); ?></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('translation.close'); ?></button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="gamePackageDelete_<?php echo e($package['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('translation.delete'); ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo e(route('ad.games.packages.delete',$package['id'])); ?>" method="POST">
                                                 <?php echo method_field('DELETE'); ?>
                                                <div class="modal-body">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($package->game->id); ?>">
                                                    <p> <?php echo app('translator')->get('translation.titleDel'); ?> <span><?php echo e($package->game->slug); ?></span> </p>

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



                </div>
            </div><!--end card-->
        </div><!--end col-->

    </div><!--end row-->
    <!-- end row -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <!-- Transaction Modal -->

    <!-- end modal -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard.init.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/games/packages.blade.php ENDPATH**/ ?>