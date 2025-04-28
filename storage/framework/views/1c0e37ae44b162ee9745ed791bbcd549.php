<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <meta charset="utf-8" />
        <title> <?php echo $__env->yieldContent('title'); ?> | <?php echo e(setting('website_name')); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content=" <?php echo e(env('APP_NAME')); ?>" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(display_file(setting('fav_icon'))); ?>">
        <?php echo $__env->make('front.layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>

    <?php echo $__env->yieldContent('body'); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('front.layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/front/layouts/master-auth.blade.php ENDPATH**/ ?>