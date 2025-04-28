<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.transactions'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
          rel="stylesheet" type="text/css" />
    <style>
        .id_not_verified{
            /*
            background:#fdc9d1;
            */
        }
        @media only screen and (max-width: 350px){
            .moreinfo, .basicinfo, .table-head {
                font-size: 14px;
            }
        }
        @media only screen and (max-width: 576px){
            .moreinfo, .basicinfo, .table-head {
                font-size: 16px;
            }
        }
        .select2-container{
            width:100% !important;
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
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.transactions'); ?>  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">

        <div class="form-group">
            <div class="form-row">
                <div class="col-auto">
                    <a class="btn btn-success" href="<?php echo e(route('front.index')); ?>"><i class="fa fa-plus"></i> <?php echo app('translator')->get('translation.Add a purchase order'); ?></a>&nbsp;
                    <a class="btn btn-info" href="<?php echo e(route('front.transactions.create')); ?>"><i class="fa fa-gift"></i> <?php echo app('translator')->get('translation.recharge the balance'); ?></a>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs mt-2">
            <li class="nav-item">
                <a class="nav-link <?php if($type != 'Pending'): ?> active <?php endif; ?>" href="<?php echo e(route('front.transactions','ALL')); ?>"><?php echo app('translator')->get('translation.All'); ?></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link <?php if($type == 'Pending'): ?> active <?php endif; ?>" href="<?php echo e(route('front.transactions')); ?>"><?php echo app('translator')->get('translation.Pending'); ?></a>
            </li>
        </ul>


        <div class="row">
            <div class="col-12">
                <div class="card pt-4">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 payment-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('translation.invoice_no'); ?></th>
                                <th><?php echo app('translator')->get('translation.amount'); ?></th>
                                <th><?php echo app('translator')->get('translation.date_at'); ?></th>
                                <th><?php echo app('translator')->get('translation.account'); ?></th>
                                <th><?php echo app('translator')->get('translation.note'); ?></th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>#<?php echo e($transaction->invoice_no); ?></td>
                                    <td><?php echo e(get_helper_price($transaction->final_total,true)); ?></td>
                                    <td><?php echo e($transaction->date_at); ?></td>
                                    <td><?php echo e($transaction->account_number); ?></td>
                                    <td><?php echo e($transaction->details); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(asset('build/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/front/transactions/index.blade.php ENDPATH**/ ?>