

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.agents'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>


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
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.agents'); ?>  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->get('translation.agents'); ?> </h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr class="table-light">
                                <th><?php echo app('translator')->get('translation.title'); ?></th>
                                <th><?php echo app('translator')->get('translation.phone'); ?></th>
                                <th><?php echo app('translator')->get('translation.area'); ?></th>
                                <th><?php echo app('translator')->get('translation.address'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th ><?php echo e($agent->title); ?></th>
                                        <td> <a href="https://wa.me/<?php echo e($agent->number); ?>" target="_blank" class="d-inline-block text-center">
                                                <i class="fa fa-whatsapp  text-success pull-left" style="font-size:1.7em;"></i>
                                            </a>

                                        </td>
                                        <td><?php echo e($agent->area); ?></td>
                                        <td><?php echo e($agent->address); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/front/agents/index.blade.php ENDPATH**/ ?>