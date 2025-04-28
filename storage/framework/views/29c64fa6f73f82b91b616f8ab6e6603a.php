

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Login'); ?>
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
                                            <h5 class="text-primary"><?php echo app('translator')->get('translation.Welcome Back !'); ?></h5>
                                            <p><?php echo e(App\Models\System::getProperty('app_name')); ?>.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo e(URL::asset('/build/images/profile-img.png')); ?>" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="<?php echo e(route('front.index')); ?>" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">

                                                <img src="<?php echo e(display_file(setting('logo'))); ?>" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="<?php echo e(route('front.index')); ?>" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo e(display_file(setting('logo'))); ?>" alt=""
                                                    class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <?php if(session()->has('errors')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('errors')->first()); ?>

                                        </div>
                                    <?php endif; ?>
                                        <?php if(session()->has('success')): ?>
                                            <div class="text-center alert alert-success">
                                                <?php echo e(session()->get('success')); ?>

                                            </div>
                                        <?php endif; ?>
                                    <form class="form-horizontal" method="POST" action="<?php echo e(route('front.login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="user_name" class="form-label"><?php echo app('translator')->get('translation.user_name'); ?></label>
                                            <input name="user_name" type="text"
                                                class="form-control <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('user_name')); ?>" id="user_name"
                                                placeholder="<?php echo app('translator')->get('translation.user_name'); ?>"
                                                   autofocus>
                                            <?php $__errorArgs = ['user_name'];
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

                                        <div class="mb-3">
                                            <label class="form-label"><?php echo app('translator')->get('translation.Password'); ?></label>
                                            <div
                                                class="input-group auth-pass-inputgroup <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <input type="password" name="password"
                                                    class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="userpassword"  placeholder=" <?php echo app('translator')->get('translation.Password'); ?>"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                <?php $__errorArgs = ['password'];
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
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember"
                                                <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="remember">
                                                <?php echo app('translator')->get('translation.Remember me'); ?>
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                <?php echo app('translator')->get('translation.Log In'); ?>
                                            </button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <?php if(session()->has('errors')): ?>
                                                <a href="<?php echo e(route('password.reset')); ?>" class="text-muted  " style="color: #924040 !important;"><i
                                                        class="mdi mdi-lock me-1"></i>  <?php echo app('translator')->get('translation.Forgot your password?'); ?></a>
                                            <?php endif; ?>

                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="mt-5 text-center">

                            <div>
                                <p><?php echo app('translator')->get('translation.Don\'t have an account ?'); ?> <a href="<?php echo e(url('register')); ?>" class="fw-medium text-primary">
                                        <?php echo app('translator')->get('translation.Signup now'); ?> </a> </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master-auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>