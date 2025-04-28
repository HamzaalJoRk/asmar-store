<?php if(auth()->user()->hasPermission('update_users')): ?>
<a href="<?php echo e(route('ad.users.edit', $user->id)); ?>" class="btn btn-warning btn-sm" title="<?php echo app('translator')->get('Edit'); ?>"><i
        class="fa fa-edit"></i> </a>
<?php endif; ?>
<?php if(auth()->user()->hasPermission('delete_users')): ?>
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="<?php echo app('translator')->get('Delete'); ?>"
    data-bs-target="#delete<?php echo e($user->id); ?>">
    <i class="fa fa-trash"></i>
</button>
<?php endif; ?>

<div class="modal fade" id="delete<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('Delete'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('ad.users.destroy', $user->id)); ?>" method="POST">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <p> <?php echo app('translator')->get('Delete'); ?> <span><?php echo e($user['name']); ?></span> </p>
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


<?php /**PATH /home/mobilegs/public_html/resources/views/admin/users/action.blade.php ENDPATH**/ ?>