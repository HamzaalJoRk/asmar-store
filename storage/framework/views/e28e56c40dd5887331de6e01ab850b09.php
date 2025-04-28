

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('transactions.transactions'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <?php if(auth()->user()->hasPermission('read_transactions')): ?>
                                <a href="<?php echo e(route('ad.transactions.create')); ?>" class="btn btn-soft-primary">
                                    <?php echo app('translator')->get('Add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(@isset($transactions) && !@empty($transactions) && count($transactions) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('transactions.user'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('transactions.bank'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('transactions.invoice_no'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('transactions.account_number'); ?></th>
                                        
                                        <th scope="col"><?php echo app('translator')->get('transactions.final_total'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row"><?php echo e($transaction->user?->user_name); ?></th>
                                            <th scope="row"><?php echo e($transaction->bank?->title); ?></th>
                                            <th scope="row"><?php echo e($transaction->invoice_no); ?></th>
                                            <th scope="row"><?php echo e($transaction->account_number); ?></th>
                                            
                                            <th scope="row"> <?php echo e(number_format( $transaction->final_total,10)); ?></th>
                                            <th scope="row">
                                                <?php if($transaction): ?>
                                                    <?php echo e($transaction->created_at->diffForHumans()); ?> <br>
                                                    <?php echo e($transaction->created_at->format('Y-m-d')); ?>

                                                    (<?php echo e($transaction->created_at->format('h:i')); ?>)
                                                    <?php echo e(($transaction->created_at->format('A')=='AM'?__('am') : __('pm'))); ?>  <br>
                                                <?php else: ?>
                                                <?php echo e(__('no_update')); ?>

                                                <?php endif; ?>
                                            </th>

                                            <td>
                                                <?php echo $__env->make('admin.transactions.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $transactions->appends(request()->all())->links(); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/admin/transactions/index.blade.php ENDPATH**/ ?>