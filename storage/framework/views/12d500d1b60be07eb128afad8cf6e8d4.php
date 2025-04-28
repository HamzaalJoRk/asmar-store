
<?php $__env->startSection('title'); ?>
    <?php echo e(__('providers.providers')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('admin.components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('providers.providers')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('common.list')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <a href="<?php echo e(route('ad.providers.create')); ?>" class="btn btn-primary waves-effect waves-light">
                            <i class="fa fa-plus"></i> <?php echo e(__('common.add')); ?>

                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo e(__('providers.name')); ?></th>
                                    <th scope="col"><?php echo e(__('providers.logo')); ?></th>
                                    <th scope="col"><?php echo e(__('providers.api_url')); ?></th>
                                    <th scope="col"><?php echo e(__('providers.is_active')); ?></th>
                                    <th scope="col"><?php echo e(__('common.actions')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($provider->name); ?></td>
                                        <td>
                                            <?php if($provider->getFirstMediaUrl('logo')): ?>
                                                <img src="<?php echo e($provider->getFirstMediaUrl('logo')); ?>" alt="<?php echo e($provider->name); ?>" style="max-width: 50px;">
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($provider->api_url); ?></td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-<?php echo e($provider->is_active ? 'success' : 'danger'); ?> font-size-11">
                                                <?php echo e($provider->is_active ? __('common.active') : __('common.inactive')); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('ad.providers.edit', $provider->id)); ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('ad.providers.destroy', $provider->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('<?php echo e(__('common.confirm')); ?>')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center"><?php echo e(__('common.no_data')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php echo e($providers->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/admin/providers/index.blade.php ENDPATH**/ ?>