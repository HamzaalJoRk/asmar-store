<?php if(auth()->user()->hasPermission('update_transactions')): ?>
<a href="<?php echo e(route('ad.transactions.edit', $transaction->id)); ?>" class="btn btn-warning btn-sm" title="<?php echo app('translator')->get('Edit'); ?>"><i
        class="fa fa-edit"></i> </a>
<?php endif; ?>
<?php if(auth()->user()->hasPermission('delete_transactions')): ?>
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="<?php echo app('translator')->get('Delete'); ?>"
    data-bs-target="#delete<?php echo e($transaction->id); ?>">
    <i class="fa fa-trash"></i>
</button>
<?php endif; ?>

<?php if($transaction->status == 'pending'): ?>
    <a href="<?php echo e(route('ad.transactions.change_status', encrypt($transaction->id))); ?>"
        title="<?php echo e(__('change')); ?> <?php echo e($transaction->status == 'pending' ? trans('approved') : trans('pending')); ?> ">
        <button id="status-btn" class="btn btn-sm btn-<?php echo e($transaction->status == 'pending' ? 'info' : 'success'); ?>">
            <i class='fa fa-toggle-off'></i>
            <?php echo e(__($transaction->status())); ?>

        </button>
    </a>
<?php elseif($transaction->status == 'approved'): ?>
    <button id="status-btn" class="btn btn-sm btn-<?php echo e($transaction->status == 'approved' ? 'success' : 'danger'); ?>"
        data-bs-toggle="modal" data-bs-target="#change<?php echo e($transaction->id); ?>"
        title="<?php echo e(__('change')); ?> <?php echo e($transaction->status == 'approved' ? trans('canceled') : trans('approved')); ?> ">
        <?php echo e(__($transaction->status())); ?>

        <i class='fa fa-toggle-on'></i>
    </button>
<?php else: ?>
    <a href="<?php echo e(route('ad.transactions.change_status', encrypt($transaction->id))); ?>"
        title="<?php echo e(__('change')); ?> <?php echo e($transaction->status == 'canceled' ? trans('approved') : trans('canceled')); ?> ">
        <button id="status-btn" class="btn btn-sm btn-<?php echo e($transaction->status == 'approved' ? 'success' : 'danger'); ?>">
            <?php echo e(__($transaction->status())); ?>

            <i class='fa fa-exclamation-circle'></i>
        </button>
    </a>
    <div title="<?php echo e($transaction->reason ?? ' '); ?>">
        <?php echo e(__('By')); ?> (<?php echo e($transaction->canceledBy?->name); ?>)
    </div>
<?php endif; ?>

<div class="modal fade" id="delete<?php echo e($transaction->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('Delete'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('ad.transactions.destroy', $transaction->id)); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <p> <?php echo app('translator')->get('titleDel'); ?> <span><?php echo e($transaction['name']); ?></span> </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><?php echo e(__('save')); ?></button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('cancel' .'accept')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>





<?php /**PATH /home/mobilegs/public_html/resources/views/admin/transactions/action.blade.php ENDPATH**/ ?>