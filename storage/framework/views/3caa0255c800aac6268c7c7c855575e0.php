

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('admins.admins'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <?php if(auth()->user()->hasPermission('read_admins')): ?>
                                <a href="<?php echo e(route('ad.admins.create')); ?>" class="btn btn-soft-primary">
                                    <?php echo app('translator')->get('Add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(@isset($admins) && !@empty($admins) && count($admins) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('admins.image'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('admins.name'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('admins.email'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('admins.phone'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('admins.status'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row">
                                                <?php if($admin->image): ?>
                                                <img src="<?php echo e(display_file($admin->image)); ?>" style="width: 50px; height: 50px;"
                                                alt="<?php echo e($admin->name); ?>" >
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('no-image.jpg')); ?>" style="width: 50px;" alt="<?php echo e($admin->name); ?> ">
                                                <?php endif; ?>
                                            </th>
                                            <th scope="row"><?php echo e($admin->name); ?></th>
                                            <th scope="row"><?php echo e($admin->email); ?></th>
                                            <th scope="row">
                                                <a href="https://wa.me/<?php echo e($admin->phone); ?>?text=" target="_blank" title="<?php echo e($admin->phone); ?>">
                                                    <img src="<?php echo e(asset('whatsapp.png')); ?>" alt="whatsapp" width="35">
                                                </a>
                                            </th>
                                            <th scope="row"><?php echo e(__($admin->status())); ?></th>
                                            <th scope="row">
                                                <?php if($admin): ?>
                                                    <?php echo e($admin->created_at->diffForHumans()); ?> <br>
                                                    <?php echo e($admin->created_at->format('Y-m-d')); ?>

                                                    (<?php echo e($admin->created_at->format('h:i')); ?>)
                                                    <?php echo e(($admin->created_at->format('A')=='AM'?__('am') : __('pm'))); ?>  <br>
                                                <?php else: ?>
                                                <?php echo e(__('no_update')); ?>

                                                <?php endif; ?>
                                            </th>


                                            <td>
                                                <?php echo $__env->make('admin.admins.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $admins->appends(request()->all())->links(); ?>

                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <?php echo e(__('data_no_found')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\D-sherif\game-shop\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>