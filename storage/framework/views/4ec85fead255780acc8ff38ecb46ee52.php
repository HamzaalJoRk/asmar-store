

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
                            <a href="<?php echo e(route('ad.transactions.index')); ?>" class="btn btn-soft-primary">
                                <?php echo app('translator')->get('Back'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('ad.transactions.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('transactions.invoice_no'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="invoice_no" class="form-control" value="<?php echo e(old('invoice_no')); ?>" placeholder="<?php echo app('translator')->get('transactions.invoice_no'); ?>" >
                                    <?php $__errorArgs = ['invoice_no'];
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
                                    <label><?php echo app('translator')->get('transactions.account_number'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="account_number" class="form-control" value="<?php echo e(old('account_number')); ?>" placeholder="<?php echo app('translator')->get('transactions.account_number'); ?>" >
                                    <?php $__errorArgs = ['account_number'];
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
                                    <label><?php echo app('translator')->get('transactions.account_name'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="account_name" class="form-control" value="<?php echo e(old('account_name')); ?>" placeholder="<?php echo app('translator')->get('transactions.account_name'); ?>" >
                                    <?php $__errorArgs = ['account_name'];
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
                                    <label><?php echo app('translator')->get('transactions.date_at'); ?><span class="text-danger">*</span></label>
                                    <input type="date" name="date_at" class="form-control" value="<?php echo e(old('date_at')); ?>" placeholder="<?php echo app('translator')->get('transactions.date_at'); ?>" >
                                    <?php $__errorArgs = ['date_at'];
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
                                    <label><?php echo app('translator')->get('transactions.banks'); ?><span class="text-danger">*</span></label>
                                    <select name="bank_id" class="form-control">
                                        <option  disabled selected><?php echo e(__('select')); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($bank->id); ?>" <?php echo e(old('bank_id')==$bank->id?'selected':null); ?>>
                                                <?php echo e($bank->title); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['bank_id'];
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
                                    <label><?php echo app('translator')->get('transactions.users'); ?><span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control">
                                        <option  disabled selected><?php echo e(__('select')); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id')==$user->id?'selected':null); ?>>
                                                <?php echo e($user->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['user_id'];
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
                                    <label><?php echo app('translator')->get('transactions.currencys'); ?><span class="text-danger">*</span></label>
                                    <select name="currency_id" class="form-control">
                                        <option  disabled selected><?php echo e(__('select')); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $currencys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($currency->id); ?>" <?php echo e(old('currency_id')==$currency->id?'selected':null); ?>>
                                                <?php echo e($currency->currency); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['currency_id'];
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
                                    <label><?php echo app('translator')->get('transactions.final_total'); ?><span class="text-danger">*</span></label>
                                    <input type="number" name="final_total" class="form-control" value="<?php echo e(old('final_total')); ?>" placeholder="<?php echo app('translator')->get('transactions.final_total'); ?>" >
                                    <?php $__errorArgs = ['final_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('transactions.details'); ?><span class="text-danger">*</span></label>
                                    <textarea name="details" class="form-control">
                                       <?php echo old('details'); ?>

                                    </textarea>
                                    <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('transactions.reason'); ?></label>
                                    <textarea name="reason" class="form-control">
                                        <?php echo old('reason'); ?>

                                    </textarea>
                                    <?php $__errorArgs = ['reason'];
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/admin/transactions/create.blade.php ENDPATH**/ ?>