<?php if(auth()->user()->hasPermission('update_banks')): ?>
    <a href="<?php echo e(route('ad.banks.edit', $bank->id)); ?>" class="btn btn-warning btn-sm" title="<?php echo app('translator')->get('Edit'); ?>"><i
    class="fa fa-edit"></i> </a>
<?php endif; ?>
<?php if(auth()->user()->hasPermission('delete_banks')): ?>
    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="<?php echo app('translator')->get('Delete'); ?>"
        data-bs-target="#delete<?php echo e($bank->id); ?>">
        <i class="fa fa-trash"></i>
    </button>
<?php endif; ?>

<div class="modal fade" id="delete<?php echo e($bank->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('Delete'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('ad.banks.destroy', $bank->id)); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <p> <?php echo app('translator')->get('titleDel'); ?> <span><?php echo e($bank['name']); ?></span> </p>
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


<?php /**PATH D:\work\D-sherif\game-shop\resources\views/admin/banks/action.blade.php ENDPATH**/ ?>