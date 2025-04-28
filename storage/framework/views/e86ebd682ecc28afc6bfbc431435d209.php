<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('site.menu'); ?></li>
                <li>
                    <a href="<?php echo e(route('ad.index')); ?>" class="active">
                        <i class="fa fa-home"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('site.home'); ?></span>
                    </a>
                </li>
                <?php if(auth()->user()->hasPermission('read_settings')): ?>
                <li>
                    <a href="<?php echo e(route('ad.settings.general')); ?>" >
                        <i class="fa fa-cogs"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('settings.settings'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_admins')): ?>
                <li>
                    <a href="<?php echo e(route('ad.admins.index')); ?>" >
                        <i class="fa fa-user"></i>
                        <span key="t-dashboards"><?php echo e(__('admins.admins')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_users')): ?>
                <li>
                    <a href="<?php echo e(route('ad.users.index')); ?>" >
                        <i class="fa fa-users"></i>
                        <span key="t-dashboards"><?php echo e(__('users.users')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_agents')): ?>
                <li>
                    <a href="<?php echo e(route('ad.agents.index')); ?>" >
                        <i class="fa fa-users"></i>
                        <span key="t-dashboards"><?php echo e(__('agents.agents')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_games')): ?>
                <li>
                    <a href="<?php echo e(route('ad.games.index')); ?>" >
                        <i class="fa fa-subway"></i>
                        <span key="t-dashboards"><?php echo e(__('games.games')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_banks')): ?>
                <li>
                    <a href="<?php echo e(route('ad.banks.index')); ?>" >
                        <i class="fa fa-bars"></i>
                        <span key="t-dashboards"><?php echo e(__('banks.banks')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_transactions')): ?>
                <li>
                    <a href="<?php echo e(route('ad.transactions.index')); ?>" >
                        <i class="fa fa-credit-card"></i>
                        <span key="t-dashboards"><?php echo e(__('transactions.transactions')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_levels')): ?>
                <li>
                    <a href="<?php echo e(route('ad.levels.index')); ?>" >
                        <i class="fa fa-user-secret"></i>
                        <span key="t-dashboards"><?php echo e(__('levels.levels')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_orders')): ?>
                <li>
                    <a href="<?php echo e(route('ad.orders.index')); ?>" >
                        <i class="fa fa-id-card"></i>
                        <span key="t-dashboards"><?php echo e(__('orders.orders')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_currencies')): ?>
                <li>
                    <a href="<?php echo e(route('ad.currencies.index')); ?>" >
                        <i class="fa fa-gift"></i>
                        <span key="t-dashboards"><?php echo e(__('currencies.currencies')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_countries')): ?>
                <li>
                    <a href="<?php echo e(route('ad.countries.index')); ?>" >
                        <i class="fa fa-flag"></i>
                        <span key="t-dashboards"><?php echo e(__('countries.countries')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermission('read_cities')): ?>
                <li>
                    <a href="<?php echo e(route('ad.cities.index')); ?>" >
                        <i class="fa fa-flag"></i>
                        <span key="t-dashboards"><?php echo e(__('cities.cities')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH /home/mobilegs/public_html/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>