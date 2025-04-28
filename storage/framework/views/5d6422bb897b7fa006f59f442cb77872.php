<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('agents.agents'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <?php if(auth()->user()->hasPermission('read_agents')): ?>
                                <a href="<?php echo e(route('ad.agents.create')); ?>" class="btn btn-soft-primary">
                                    <?php echo app('translator')->get('Add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(@isset($agents) && !@empty($agents) && count($agents) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('agents.title'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('agents.number'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('agents.area'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('agents.address'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('agents.is_active'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row"><?php echo e($agent['title']); ?></th>
                                            <th scope="row"><?php echo e($agent['number']); ?></th>
                                            <th scope="row"><?php echo e($agent['area']); ?></th>
                                            <th scope="row"><?php echo e($agent['address']); ?></th>
                                            <th scope="row"> <?php echo e(__($agent->status())); ?></th>
                                            <th scope="row"><?php echo e($agent['created_at']->diffForHumans()); ?></th>
                                            <td>
                                                <?php echo $__env->make('admin.agents.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $agents->appends(request()->all())->links(); ?>

                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/agents/index.blade.php ENDPATH**/ ?>