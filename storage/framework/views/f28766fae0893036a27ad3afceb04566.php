<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Recover_Password'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <body>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary"> <?php echo app('translator')->get('translation.Password Reset'); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo e(URL::asset('/build/images/profile-img.png')); ?>" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="<?php echo e(route('front.index')); ?>">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo e(URL::asset('/images/'. App\Models\System::getProperty('logo-light-sm'))); ?>" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <?php if(session()->has('errors')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session()->get('errors')->first()); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(session()->has('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session()->get('success')); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="p-2">
                                    <?php if(session('status')): ?>
                                        <div class="alert alert-success text-center mb-4" role="alert">
                                            <?php echo e(session('status')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <form class="form-horizontal" method="POST" action="<?php echo e(route('front.reset.post')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label"><?php echo app('translator')->get('translation.Email'); ?></label>
                                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="useremail" name="email" placeholder="<?php echo app('translator')->get('translation.Email'); ?>"
                                                value="<?php echo e(old('email')); ?>" id="email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit"><?php echo app('translator')->get('translation.Reset'); ?></button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p><?php echo app('translator')->get('translation.Remember It ?'); ?> <a href="<?php echo e(url('login')); ?>" class="fw-medium text-primary"> <?php echo app('translator')->get('translation.Sign In here'); ?></a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>