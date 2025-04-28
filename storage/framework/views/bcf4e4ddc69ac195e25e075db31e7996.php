
<?php $__env->startSection('title'); ?>
    <?php echo e(__('providers.providers')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('admin.components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('providers.providers')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('common.edit')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('ad.providers.update', $provider->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.name')); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $provider->name)); ?>"
                                        placeholder="<?php echo e(__('providers.name')); ?>">
                                    <?php $__errorArgs = ['name'];
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.api_url')); ?><span class="text-danger">*</span></label>
                                    <input type="url" name="api_url" class="form-control" value="<?php echo e(old('api_url', $provider->api_url)); ?>"
                                        placeholder="<?php echo e(__('providers.api_url')); ?>">
                                    <?php $__errorArgs = ['api_url'];
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.api_key')); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="api_key" class="form-control" value="<?php echo e(old('api_key', $provider->api_key)); ?>"
                                        placeholder="<?php echo e(__('providers.api_key')); ?>">
                                    <?php $__errorArgs = ['api_key'];
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.logo')); ?></label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                    <?php if($provider->getFirstMediaUrl('logo')): ?>
                                        <img src="<?php echo e($provider->getFirstMediaUrl('logo')); ?>" alt="<?php echo e($provider->name); ?>" class="mt-2" style="max-width: 100px;">
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['logo'];
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.api_endpoints')); ?></label>
                                    <textarea name="api_endpoints" class="form-control"><?php echo e(old('api_endpoints', $provider->api_endpoints)); ?></textarea>
                                    <?php $__errorArgs = ['api_endpoints'];
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.description')); ?></label>
                                    <textarea name="description" class="form-control"><?php echo e(old('description', $provider->description)); ?></textarea>
                                    <?php $__errorArgs = ['description'];
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.notes')); ?></label>
                                    <textarea name="notes" class="form-control"><?php echo e(old('notes', $provider->notes)); ?></textarea>
                                    <?php $__errorArgs = ['notes'];
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__('providers.is_active')); ?><span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" <?php echo e(old('is_active', $provider->is_active) == 1 ? 'selected' : ''); ?>><?php echo e(__('common.active')); ?></option>
                                        <option value="0" <?php echo e(old('is_active', $provider->is_active) == 0 ? 'selected' : ''); ?>><?php echo e(__('common.inactive')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['is_active'];
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
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> <?php echo e(__('common.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\hamza\new-store\resources\views/admin/providers/edit.blade.php ENDPATH**/ ?>