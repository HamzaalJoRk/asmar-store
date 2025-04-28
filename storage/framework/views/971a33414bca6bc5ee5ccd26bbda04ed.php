

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
                            <a href="<?php echo e(route('ad.banks.index')); ?>" class="btn btn-soft-primary">
                                <?php echo app('translator')->get('Back'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('ad.banks.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('banks.title'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" placeholder="<?php echo app('translator')->get('banks.title'); ?>" >
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('banks.minimum_payment'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="minimum_payment" class="form-control" value="<?php echo e(old('minimum_payment')); ?>" placeholder="<?php echo app('translator')->get('banks.minimum_payment'); ?>" step=".01" min="0">
                                    <?php $__errorArgs = ['minimum_payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('banks.limit_payment'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="limit_payment" class="form-control" value="<?php echo e(old('limit_payment')); ?>" placeholder="<?php echo app('translator')->get('banks.limit_payment'); ?>" step="0.01" min="0">
                                    <?php $__errorArgs = ['limit_payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('banks.fee_percentage'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="fee_percentage" class="form-control" value="<?php echo e(old('fee_percentage')); ?>" placeholder="<?php echo app('translator')->get('banks.fee_percentage'); ?>" step="0.01" min="0">
                                    <?php $__errorArgs = ['fee_percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('banks.address'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>" placeholder="<?php echo app('translator')->get('banks.address'); ?>" >
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('banks.is_active'); ?><span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" <?php echo e(old('is_active') == 1 ? 'selected' : null); ?>><?php echo e(__('Active')); ?></option>
                                        <option value="0" <?php echo e(old('is_active') == 0 ? 'selected' : null); ?>><?php echo e(__('Inactive')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i><?php echo app('translator')->get('Add'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/admin/banks/create.blade.php ENDPATH**/ ?>