<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('users.users'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <?php if(auth()->user()->hasPermission('read_users')): ?>
                                <a href="<?php echo e(route('ad.users.create')); ?>" class="btn btn-soft-primary">
                                    <?php echo app('translator')->get('Add'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(@isset($users) && !@empty($users) && count($users) > 0 ): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('ID'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.image'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.name'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.email'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.phone'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.countrycity'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.currency'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.user_balance'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('users.status'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Created_at'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($index+1); ?></th>
                                            <th scope="row">
                                                <?php if($user->avatar): ?>
                                                <img src="<?php echo e(display_file($user->avatar)); ?>" style="width: 50px; height: 50px;"
                                                alt="<?php echo e($user->name); ?>" >
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('no-image.jpg')); ?>" style="width: 50px;" alt="<?php echo e($user->name); ?> ">
                                                <?php endif; ?>
                                            </th>
                                            <th scope="row"><?php echo e($user->name); ?></th>
                                            <th scope="row"><?php echo e($user->email); ?></th>
                                            <th scope="row">
                                                <a href="https://wa.me/<?php echo e($user->whats_app); ?>?text=" target="_blank" title="<?php echo e($user->whats_app); ?>">
                                                    <img src="<?php echo e(asset('whatsapp.png')); ?>" alt="whatsapp" width="35">
                                                </a>
                                            </th>
                                            <th scope="row"><?php echo e($user->country?->title); ?>/<?php echo e($user->city?->title); ?></th>
                                            <th scope="row"><?php echo e($user->currency?->currency); ?></th>
                                            <th scope="row"> <?php echo e($user->user_balance); ?> $
                                                <br> 
                                                <?php echo e($user->getExchangeRate()); ?> <?php echo e($user->getExchangeSymbol()); ?>

                                            </th>
                                            <th scope="row"><?php echo e(__($user->status())); ?></th>
                                            <th scope="row">
                                                
                                                
                                                <?php if($user): ?>
                                                    <?php echo e($user->created_at->diffForHumans()); ?> <br>
                                                    <?php echo e($user->created_at->format('Y-m-d')); ?>

                                                    (<?php echo e($user->created_at->format('h:i')); ?>)
                                                    <?php echo e(($user->created_at->format('A')=='AM'?__('am') : __('pm'))); ?>  <br>
                                                <?php else: ?>
                                                <?php echo e(__('no_update')); ?>

                                                <?php endif; ?>
                                            </th>


                                            <td>
                                                <?php echo $__env->make('admin.users.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <div class="float-right">
                                            <?php echo $users->appends(request()->all())->links(); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/users/index.blade.php ENDPATH**/ ?>