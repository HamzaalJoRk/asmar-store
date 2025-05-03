<?php echo $__env->yieldContent('css'); ?>

<!-- Bootstrap Css -->
<link href="<?php echo e(asset('build/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo e(asset('build/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo e(asset('build/css/app.min.css')); ?>"  rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>"   rel="stylesheet" type="text/css" />
<?php if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl'): ?>
    <link href="<?php echo e(asset('build/css/app-rtl.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

<?php endif; ?>
<script src="https://kit.fontawesome.com/a25cfb3468.js" crossorigin="anonymous"></script>
<style>

    .products_list {
        width: 100%;
        padding: 0;
        list-style: none;
        text-align: center;
    }
    .products_list li {
        width: 42.33%;
        margin-top: 18px;
        flex: 1 1 25em;
        list-style-type: none;
        display: inline-block;
        max-width: 125px;
    }
    .product_group.disabled {
        opacity: 0.4;
    }
    .products_list li a {
        display: block;
        overflow: hidden;
        position: relative;
        margin: .5em;
        box-shadow: rgba(0,0,0,.25) 0 0 1em;
        border-radius: .5em;
        text-decoration: none;
        color: inherit;
        background: #fff;
    }

    a.disabled {
        cursor: not-allowed;
    }
    .products_list li a .name_wrp {
        background-color: #aaa;
        padding: 1.5em 0 1.5em 0;
        display: -webkit-flex;
        display: flex;
        align-items: center;
        background-position: center;
        transition: .3s;
    }
    .products_list li a .name_wrp .icon {
        flex: none;
        float: right;
        margin: 0 auto;
    }
    .products_list li a .name_wrp .icon img {
        height: 60px;
    }
</style>
<?php /**PATH D:\Personal\Freelancer\AppMarketProject\asmar teck\asmar-store\resources\views/front/layouts/head-css.blade.php ENDPATH**/ ?>