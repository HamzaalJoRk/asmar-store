<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
           <?php echo app('translator')->get('users.edit_profile'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('ad.profile.update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('users.name'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name', auth()->user()->name)); ?>"  >
                                    <?php $__errorArgs = ['name'];
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
                                    <label><?php echo app('translator')->get('users.email'); ?></label>
                                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>
                                    <?php $__errorArgs = ['email'];
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
                                  <label><?php echo app('translator')->get('users.phone'); ?><span class="text-danger">*</span></label>
                                  <input type="tel" name="phone" class="form-control" value="<?php echo e(old('phone',auth()->user()->phone)); ?>" placeholder="phone"
                                      maxlength="11" minlength="11"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                          <div class="col-md-6">
                            
                            <div class="form-group">
                                <label><?php echo app('translator')->get('users.image'); ?> <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control img" accept="image/*">
                                <div class="col-md-4">
                                    <?php if(auth()->user()->image): ?>
                                      <img src="<?php echo e(display_file(auth()->user()->image)); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="img-thumbnail img-preview" width="200px">
                                    <?php else: ?>
                                      <img src="<?php echo e(asset('no-image.jpg')); ?>" alt="" class="img-thumbnail img-preview" width="100px">
                                    <?php endif; ?>
                                </div>
                                <?php $__errorArgs = ['image'];
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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i><?php echo app('translator')->get('Edit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/profile/edit.blade.php ENDPATH**/ ?>