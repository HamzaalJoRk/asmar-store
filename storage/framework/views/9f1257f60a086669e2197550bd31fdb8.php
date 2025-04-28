

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .col-md-2 {
            margin: auto;
        }
        .hr-add{
            border: 0.5px solid #c9c9c9;
            margin: 6px 5%;
            width: 80%;
        }
        .row.card-header {
            background-color: #00000008;
            margin: 0 !important;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(isset($_GET['action'])=='addGame'): ?>
        <!-- end row -->
        <?php $__env->startComponent('components.breadcrumb'); ?>
            <?php $__env->slot('li_1'); ?>
                <?php echo app('translator')->get('site.home'); ?>
            <?php $__env->endSlot(); ?>
            <?php $__env->slot('title'); ?>
                <?php echo app('translator')->get('translation.Add'); ?> <?php echo app('translator')->get('translation.Games'); ?>
            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
        <?php echo $__env->make('admin.games.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif(!isset($_GET['action'])): ?>
        <!-- end row -->
        <?php $__env->startComponent('components.breadcrumb'); ?>
            <?php $__env->slot('li_1'); ?>
                <?php echo app('translator')->get('site.home'); ?>
            <?php $__env->endSlot(); ?>
            <?php $__env->slot('title'); ?>
                <?php echo app('translator')->get('levels.Games'); ?>
            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
        <?php echo $__env->make('admin.games.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard.init.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/zain-market.com/public_html/resources/views/admin/games/index.blade.php ENDPATH**/ ?>