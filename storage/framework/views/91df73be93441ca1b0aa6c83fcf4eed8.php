

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('orders.orders'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <?php if(@isset($orders) && !@empty($orders) && count($orders) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('orders.user'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('orders.game'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('orders.status'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('orders.qty'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('orders.created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('change'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row"><?php echo e($order->user?->name); ?></th>
                                            <th scope="row"><?php echo e($order->game?->slug); ?></th>
                                            <th scope="row"><?php echo e(__($order->status())); ?></th>
                                            <th scope="row"><?php echo e($order->qty); ?></th>
                                            <th scope="row">
                                                <?php if($order): ?>
                                                    <?php echo e($order->created_at->diffForHumans()); ?> <br>
                                                    <?php echo e($order->created_at->format('Y-m-d')); ?>

                                                    (<?php echo e($order->created_at->format('h:i')); ?>)
                                                    <?php echo e(($order->created_at->format('A')=='AM'?__('am') : __('pm'))); ?>  <br>
                                                <?php else: ?>
                                                <?php echo e(__('no_update')); ?>

                                                <?php endif; ?>
                                            </th>
                                            <td>
                                                <?php echo $__env->make('admin.orders.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $orders->appends(request()->all())->links(); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1-projects\2-Sherif-shalaby\mobile-shop\mobile.code.shop\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>