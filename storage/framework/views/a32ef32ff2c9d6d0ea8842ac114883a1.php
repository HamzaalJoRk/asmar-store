<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.myOrders'); ?> <?php $__env->stopSection(); ?>
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

        span.alert_approved {
            background-color: #10c281;
            color: #fff;
            padding: 5px;
            border-radius: 9px;
        }
        span.alert_pending {
            background-color: #f1b44c;
            color: #fff;
            padding: 5px;
            border-radius: 9px;
        }
        span.alert_canceled {
            background-color: #9f0000;
            color: #fff;
            padding: 5px;
            border-radius: 9px;
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
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.myOrders'); ?>  <?php $__env->endSlot(); ?>
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
                <a class="nav-link <?php if($type != 'Pending'): ?> active <?php endif; ?>" href="<?php echo e(route('front.orders','ALL')); ?>"><?php echo app('translator')->get('translation.All'); ?></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link <?php if($type == 'Pending'): ?> active <?php endif; ?>" href="<?php echo e(route('front.orders')); ?>"><?php echo app('translator')->get('translation.Pending'); ?></a>
            </li>
        </ul>


        <div class="row">
            <div class="col-12">
                <div class="card pt-4">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 order-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('translation.invoice_no'); ?></th>
                                <th><?php echo app('translator')->get('translation.playerid'); ?></th>
                                <th><?php echo app('translator')->get('translation.playername'); ?></th>
                                <th><?php echo app('translator')->get('translation.status'); ?></th>
                                <th><?php echo app('translator')->get('translation.name'); ?></th>
                                <th><?php echo app('translator')->get('translation.qyt'); ?></th>
                                <th><?php echo app('translator')->get('translation.amount'); ?></th>
                                <th><?php echo app('translator')->get('translation.note'); ?></th>
                                <th><?php echo app('translator')->get('translation.date_at'); ?></th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($game=$order->game); ?>
                                <tr>
                                    <td>#<?php echo e($order->invoice_no); ?></td>
                                    <td><?php echo e($order->player_id); ?></td>
                                    <td><?php echo e($order->player_name); ?></td>
                                    <td>
                                        <span class="alert_<?php echo e($order->status); ?>">
                                            <?php echo e(__('translation.'.$order->status)); ?>

                                        </span>
                                        <?php if($order->status == 'canceled'): ?>
                                            <br>
                                            <br>
                                            <span class="w-100 text-center " >
                                              <?php echo e($order-> reason); ?>

                                            </span>
                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo e($game->title); ?></td>
                                    <td> <?php if($order->package): ?><?php echo e($order->qty); ?>  × <?php echo e($order->package->quantity); ?> <?php echo e($game->name_currency); ?> <?php else: ?> <?php echo e($order->qty); ?> <?php echo e($game->name_currency); ?> <?php endif; ?></td>
                                    <td><?php echo e(get_helper_price($order->final_total,true)); ?></td>
                                    <td><?php echo e($order->details); ?></td>
                                    <td><?php echo e($order->created_at); ?></td>
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

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/front/orders/index.blade.php ENDPATH**/ ?>