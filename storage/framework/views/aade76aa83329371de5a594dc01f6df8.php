<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                

                <a href="/ad/dashboard/" class="logo logo-light">
                    <span class="logo-sm">
                        
                        <?php if(setting('fav_icon')): ?>
                            <img src="<?php echo e(display_file(setting('fav_icon'))); ?>" height="22">
                        <?php else: ?>
                            <img src="<?php echo e(asset('no-image.jpg')); ?>" height="22">
                        <?php endif; ?>
                    </span>
                    <span class="logo-lg">
                        
                        <?php if(setting('logo')): ?>
                            <img src="<?php echo e(display_file(setting('logo'))); ?>" width="50px">
                        <?php else: ?>
                            <img src="<?php echo e(asset('no-image.jpg')); ?>" alt="" width="50px">
                        <?php endif; ?>
                    </span>



                </a>
            </div>

            




        </div>

        <div class="d-flex">

            

            

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo e(asset('images/flags/' . app()->getLocale() . '-flag.png')); ?>" alt="Header Language"
                        height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($localeCode != App::getLocale()): ?>
                            <a rel="alternate" hreflang="<?php echo e($localeCode); ?>"
                                href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>"
                                class="dropdown-item notify-item language" data-lang="eng">
                                <img src="<?php echo e(asset('images/flags/' . $localeCode . '-flag.png')); ?>"
                                    alt="<?php echo e($properties['native']); ?>" class="me-1" height="12"> <span
                                    class="align-middle"><?php echo e($properties['native']); ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if(auth()->user()->image): ?>
                        <img class="rounded-circle header-profile-user" src="<?php echo e(display_file(auth()->user()->image)); ?>"
                        alt="<?php echo e(auth()->user()->name); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('no-image.jpg')); ?>" alt="" class="rounded-circle header-profile-user">
                    <?php endif; ?>
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo e(ucfirst(Auth::user()->name)); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    
                    <a class="dropdown-item" href="<?php echo e(route('ad.settings.general')); ?>">
                        <i class="bx bx-wallet font-size-16 align-middle me-1"></i>
                        <span key="t-my-wallet"><?php echo app('translator')->get('settings.settings'); ?></span>
                    </a>
                    
                    <a class="dropdown-item" href="<?php echo e(route('ad.profile.edit')); ?>">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile"><?php echo app('translator')->get('users.profile'); ?></span>
                    </a>
                    
                    <a class="dropdown-item" href="<?php echo e(route('ad.profile.password.edit')); ?>">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile"><?php echo app('translator')->get('users.change_password'); ?></span>
                    </a>

                    

                    
                    

                    
                    <a class="dropdown-item text-danger" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout"><?php echo app('translator')->get('translation.Logout'); ?></span></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</header>

<?php /**PATH D:\work\D-sherif\game-shop\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>