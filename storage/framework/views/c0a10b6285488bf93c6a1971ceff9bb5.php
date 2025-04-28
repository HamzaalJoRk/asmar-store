<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
          rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('orders.orders'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <?php if(@isset($orders) && !@empty($orders) && count($orders) > 0 ): ?>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('translation.invoice_no'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('orders.user'); ?></th>
                                    <th><?php echo app('translator')->get('translation.playerid'); ?></th>
                                    <th><?php echo app('translator')->get('translation.playername'); ?></th>
                                    <th><?php echo app('translator')->get('translation.status'); ?></th>
                                    <th><?php echo app('translator')->get('translation.name'); ?></th>
                                    <th><?php echo app('translator')->get('translation.qyt'); ?></th>
                                    <th><?php echo app('translator')->get('translation.amount'); ?></th>
                                    <th><?php echo app('translator')->get('translation.note'); ?></th>
                                    <th><?php echo app('translator')->get('translation.date_at'); ?></th>
                                    <th><?php echo app('translator')->get('translation.action'); ?></th>

                                </tr>
                                </thead>
    
    
                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php ($game=$order->game); ?>
                                    <tr>
                                        <td>#<?php echo e($order->invoice_no); ?></td>
                                        <th scope="row"><?php echo e($order->user?->name); ?></th>
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
                                        <td><?php echo e($game?->title); ?></td>
                                        <td> <?php if($order->package): ?><?php echo e($order->qty); ?>  × <?php echo e($order->package->quantity); ?> <?php echo e($game->name_currency); ?> <?php else: ?> <?php echo e($order->qty); ?> <?php echo e($game->name_currency); ?> <?php endif; ?></td>
                                        <td><?php echo e($order->final_total); ?></td>
                                        <td><?php echo e($order->details); ?></td>
                                        <th scope="row">
                                                <?php if($order): ?>
                                                    <?php echo e($order->created_at->diffForHumans()); ?> <br>
                                                    <?php echo e($order->created_at->format('Y-m-d')); ?>

                                                    (<?php echo e($order->created_at->format('h:i')); ?>)
                                                    <?php echo e(($order->created_at->format('A')=='AM'?__('am') : __('pm'))); ?>  <br>
                                                <?php else: ?>
                                                <?php echo e(__('no_update')); ?>

                                                <?php endif; ?>
                                            </th>
                                        <td>
                                            <?php echo $__env->make('admin.orders.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </td>
                                    </tr>
    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="12">
                                            <div class="float-right">
                                                <?php echo $orders->appends(request()->all())->links(); ?>

                                            </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <?php echo e(__('data_no_found')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>