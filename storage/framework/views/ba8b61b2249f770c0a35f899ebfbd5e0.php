

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('banks.banks'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <?php if(auth()->user()->hasPermission('read_banks')): ?>
                                <a href="<?php echo e(route('ad.banks.create')); ?>" class="btn btn-soft-primary">
                                    <?php echo app('translator')->get('Add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(@isset($banks) && !@empty($banks) && count($banks) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('banks.title'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('banks.minimum_payment'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('banks.limit_payment'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('banks.fee_percentage'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('banks.address'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('banks.is_active'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row"><?php echo e($bank['title']); ?></th>
                                            <th scope="row"><?php echo e($bank['minimum_payment']); ?></th>
                                            <th scope="row"><?php echo e($bank['limit_payment']); ?></th>
                                            <th scope="row"><?php echo e($bank['fee_percentage']); ?></th>
                                            <th scope="row"><?php echo e($bank['address']); ?></th>
                                            <th scope="row"> <?php echo e(__($bank->status())); ?></th>
                                            <th scope="row"><?php echo e($bank['created_at']->diffForHumans()); ?></th>
                                            <td>
                                                <?php echo $__env->make('admin.banks.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $banks->appends(request()->all())->links(); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1-projects\2-Sherif-shalaby\mobile-shop\mobile.code.shop\resources\views/admin/banks/index.blade.php ENDPATH**/ ?>