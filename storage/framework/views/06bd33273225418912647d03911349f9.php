<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box mr-3 ml-3">


                <a href="<?php echo e(route('front.index')); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(display_file(setting('logo'))); ?>" alt="<?php echo e(setting('website_name')); ?>"
                             height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(display_file(setting('logo'))); ?>"
                             alt="<?php echo e(setting('website_name')); ?>" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect  d-block d-lg-none" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <?php if(auth()->guard('web')->check()): ?>
                <a href="<?php echo e(route('front.transactions.create')); ?>" class="alert alert-success pull-left mt-3 ml-2 mr-3" style="margin: 0 20px;margin-bottom:0;max-height:38px;padding-top:0.3rem;font-size:1.2em;color:#155724">
                    <strong class=""><?php echo e(get_helper_price(auth()->user()->user_balance,true)); ?></strong>
                </a>
                <a href="<?php echo e(route('front.account-level')); ?>" class="pull-left  mt-3 ml-2 mr-3"style="margin-left: 10px;margin-right: 10px;">
                    <img src="<?php echo e(asset('images/levels/5.png')); ?>" style="height:38px;">
                </a>
            <?php endif; ?>

        </div>

    <div class="d-flex">


        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo e(asset('images/flags/'.app()->getLocale().'-flag.png')); ?>" alt="Header Language" height="16">
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($localeCode != App::getLocale()): ?>
                        <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" class="dropdown-item notify-item language" data-lang="eng">
                            <img src="<?php echo e(asset ('images/flags/'.$localeCode.'-flag.png')); ?>" alt="<?php echo e($properties['native']); ?>" class="me-1" height="12"> <span class="align-middle"><?php echo e($properties['native']); ?></span>
                        </a>


                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>


        <?php if(auth()->guard('web')->check()): ?>
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('build/images/users/avatar-1.jpg')); ?>"
                    alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo e(ucfirst(Auth::user()->name)); ?></span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="<?php echo e(route('front.my-profile')); ?>"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile"><?php echo app('translator')->get('translation.Profile'); ?></span></a>
                <a class="dropdown-item" href="<?php echo e(route('front.transactions.create')); ?>"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet"><?php echo app('translator')->get('translation.recharge the balance'); ?></span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo app('translator')->get('translation.Logout'); ?></span></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
</header>
<?php if(auth()->guard('web')->check()): ?>
<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                            class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="current_password" autocomplete="current_password"
                            placeholder="Enter Current Password" value="<?php echo e(old('current_password')); ?>">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                            autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="<?php echo e(Auth::user()->id); ?>"
                            type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>
<?php /**PATH /home/mobilegs/public_html/resources/views/front/layouts/topbar.blade.php ENDPATH**/ ?>