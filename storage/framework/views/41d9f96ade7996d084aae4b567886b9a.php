

<?php if($order->status == 'pending'): ?>
    <a href="<?php echo e(route('ad.orders.change_status', encrypt($order->id))); ?>"
        title="<?php echo e(__('change')); ?> <?php echo e($order->status == 'pending' ? trans('approved') : trans('pending')); ?> ">
        <button id="status-btn" class="btn btn-sm btn-<?php echo e($order->status == 'pending' ? 'info' : 'success'); ?>">
            <i class='fa fa-toggle-off'></i>
            <?php echo e(__($order->status())); ?>

        </button>
    </a>
<?php elseif($order->status == 'approved'): ?>
    <button id="status-btn" class="btn btn-sm btn-<?php echo e($order->status == 'approved' ? 'success' : 'danger'); ?>"
        data-bs-toggle="modal" data-bs-target="#change<?php echo e($order->id); ?>"
        title="<?php echo e(__('change')); ?> <?php echo e($order->status == 'approved' ? trans('canceled') : trans('approved')); ?> ">
        <?php echo e(__($order->status())); ?>

        <i class='fa fa-toggle-on'></i>
    </button>
<?php else: ?>
    <a href="<?php echo e(route('ad.orders.change_status', encrypt($order->id))); ?>"
        title="<?php echo e(__('change')); ?> <?php echo e($order->status == 'canceled' ? trans('approved') : trans('canceled')); ?> ">
        <button id="status-btn" class="btn btn-sm btn-<?php echo e($order->status == 'approved' ? 'success' : 'danger'); ?>">
            <?php echo e(__($order->status())); ?>

            <i class='fa fa-exclamation-circle'></i>
        </button>
    </a>
    <div title="<?php echo e($order->reason ?? ' '); ?>">
        <?php echo e(__('By')); ?> (<?php echo e($order->canceledBy?->name); ?>)
    </div>
<?php endif; ?>

<div class="modal fade" id="delete<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('Delete'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('ad.orders.destroy', $order->id)); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <p> <?php echo app('translator')->get('titleDel'); ?> <span><?php echo e($order['name']); ?></span> </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><?php echo e(__('save')); ?></button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="change<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('change-reson'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('ad.orders.cancel_status', encrypt($order->id))); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <p> <?php echo app('translator')->get('orders.invoice_no'); ?> <span><?php echo e($order['invoice_no']); ?></span> </p>
                    <div class="form-group">
                        <input type="hidden" name="status" value="<?php echo e($order->status); ?>" id=""
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label><?php echo app('translator')->get('change-reson'); ?><span class="text-danger">*</span></label>
                        <textarea name="reason" class="form-control">
                            <?php echo old('reason', $order->reason); ?>

                        </textarea>
                        <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><?php echo e(__('change')); ?></button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php /**PATH /home/mobilegs/public_html/resources/views/admin/orders/action.blade.php ENDPATH**/ ?>