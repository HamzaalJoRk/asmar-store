

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.create transactions'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

    <style>
        .payment_code_label{
            width:100%;
            margin-bottom:30px;
        }
        .bank-name{
            min-height:60px;
        }
        #clearsearch{
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            height: 16px;
            margin: auto;
            font-size: 16px;
            cursor: pointer;
            color: #ccc;
        }
        #clearsearch:hover{
            color:#000;
        }
        .altprice{
            color:grey;
            font-size:15px;
        }
        .paymment_gateways_list{
            width:100%;
            padding:0;
            list-style:none;
            text-align:center;
        }
        .paymment_gateways_list li{
            margin-top:18px;
            flex: 1 1 25em;
            list-style-type: none;
            display: inline-block;
        }
        .paymment_gateways_list li a{
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
        .paymment_gateways_list li a .name_wrp{
            background-color: #aaa;
            padding: 1.5em 0 1.5em 0;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            background-position: center;
            transition: .3s;
        }
        .paymment_gateways_list li a .name_wrp .icon{
            flex: none;
            float:right;
            margin: 0 auto;
        }
        .paymment_gateways_list li a .name_wrp .icon img{
            height:32px;
        }
        .paymment_gateways_list li a .name_wrp .name{
            margin-right: 1em;
            font-size: 1.25em;
            font-weight: 700;
            color: #fff;
            flex: auto;
            max-height: 4.5em;
            overflow: hidden;
        }
        .select2 {
            width:100% !important;
        }
        a.disabled{
            cursor: not-allowed;
        }
        .product-icon img{
            max-width:20px;
        }
        .icon div{
            width: 60px;
            height: 60px;
            color: #FFF;
            font-size: 24px;
            padding-top: 12px;
            border-radius: 10px;
            background: #03a9f4;
        }
    </style>
    <?php if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl'): ?>
        <style>


        </style>
    <?php else: ?>
        <style>
            .products_list li a .name_wrp .icon {
                flex: none;
                float: left !important;
                right: 0;
                left: auto !important;
                margin: 0 auto;
            }
        </style>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <body data-sidebar="dark" data-layout-scrollable="true">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> <?php echo app('translator')->get('translation.index'); ?>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.create transactions'); ?>  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="card card-login mx-auto">
            <div class="card-body">

                <div class="form-group payment_gateways">
                    <div class="form-row">
                        <div class="w-100">
                            <ul class="paymment_gateways_list">
                                <?php if(isset($banks)): ?>
                                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="col-xl-2 col-5 pr-0 pl-0">
                                            <a href="<?php echo e(route('front.transactions.stepTwo',$bank->id)); ?>" class="payment_gateway">
                                                <div class="name_wrp" style="background-image:url('<?php echo e(asset('images/icons/background.jpg')); ?>');">
                                                    <div class="icon">
                                                        <div>
                                                            <img src="<?php echo e(asset('images/icons/cash.png')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="d-block mt-2 mb-2"><?php echo e($bank->title); ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\hamza\new-store\resources\views/front/transactions/create.blade.php ENDPATH**/ ?>