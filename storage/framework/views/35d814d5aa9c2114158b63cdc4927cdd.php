

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('levels.levels'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <?php if(auth()->user()->hasPermission('read_levels')): ?>
                                <a href="<?php echo e(route('ad.levels.create')); ?>" class="btn btn-soft-primary">
                                    <?php echo app('translator')->get('Add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(@isset($levels) && !@empty($levels) && count($levels) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('levels.image'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('levels.level'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row">
                                                <?php if($level->image): ?>
                                                <img src="<?php echo e(display_file($level->image)); ?>" style="width: 50px; height: 50px;"
                                                alt="" >
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('no-image.jpg')); ?>" style="width: 50px;" alt="">
                                                <?php endif; ?>
                                            </th>
                                            <th scope="row"><?php echo e($level['title']); ?></th>
                                            <th scope="row"> <?php echo e($level->created_at->format('Y-m-d')); ?></th>
                                            <td>
                                                <?php echo $__env->make('admin.levels.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $levels->appends(request()->all())->links(); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1-projects\2-Sherif-shalaby\mobile-shop\mobile.code.shop\resources\views/admin/levels/index.blade.php ENDPATH**/ ?>