<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>
                <li>
                    <a href="<?php echo e(route('front.index')); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-index"><?php echo app('translator')->get('translation.index'); ?></span>
                    </a>
                </li>

                <?php if(auth()->guard('web')->check()): ?>

                    <li>
                        <a href="<?php echo e(route('front.transactions')); ?>" class="waves-effect">
                            <i class="fa fa-money"></i>
                            <span key="t-index"><?php echo app('translator')->get('translation.transactions'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.transactions.create')); ?>" class="waves-effect">
                            <i class="fa fa-money"></i>
                            <span key="t-index"><?php echo app('translator')->get('translation.create transactions'); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('front.orders','ALL')); ?>" class="waves-effect">
                            <i class="fa fa-truck"></i>
                            <span key="t-index"><?php echo app('translator')->get('translation.myOrders'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('front.agents')); ?>" class="waves-effect">
                            <i class="fa fa-truck"></i>
                            <span key="t-index"><?php echo app('translator')->get('translation.agents'); ?></span>
                        </a>
                    </li>


                <?php else: ?>
                    <li>
                        <a href="<?php echo e(url('login')); ?>" class="waves-effect">
                            <i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>
                            <span key="t-login"><?php echo app('translator')->get('translation.login'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('register')); ?>" class="waves-effect">
                            <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                            <span key="t-register"><?php echo app('translator')->get('translation.register'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
            <div class="alert-wrap mt-3 mr-2 ml-2">
                <div class="alert alert-success">
                    <strong class="pull-right"><?php echo app('translator')->get('translation.Technical Support'); ?> : </strong>
                    <a href="<?php echo e(setting('whatsup')); ?>" target="_blank"style="margin: 0px 5px;font-size: 18px;">
                        <i class="fa fa-whatsapp text-success pull-left" style="font-size:1.3em;"></i>
                    </a>
                    <a href="<?php echo e(setting('telegram')); ?>" target="_blank" style="margin: 0px 5px;font-size: 18px;">
                        <i class="fa fa-telegram text-info pull-left pl-2" style="font-size:1.3em;"></i>
                    </a>

                </div>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH F:\hamza\new-store\resources\views/front/layouts/sidebar.blade.php ENDPATH**/ ?>