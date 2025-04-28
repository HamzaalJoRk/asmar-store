<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.index'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <body data-sidebar="dark" data-layout-scrollable="true">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- App Search-->
    <div class="app-search d-none d-lg-block">

        <div class="position-relative">
            <input type="text" class="form-control" id="searchInput" placeholder="<?php echo app('translator')->get('translation.Search'); ?>">
            <span class="bx bx-search-alt"></span>
        </div>
    </div>


    <div class="row">
        <div class="form-group products">
            <div class="form-row">
                <div class="w-100">
                    <ul class="products_list" id="products_list">
                        <?php if(isset($games)): ?>
                            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="col-4 pr-0 pl-0">
                                    <a href="<?php echo e(route('front.game.show',$game->slug)); ?>" class="product_group <?php if(!$game->is_active): ?> disabled <?php endif; ?>" data-group="soulchill">
                                        <div class="name_wrp" style="background-image:url(<?php echo e($game->background); ?>);">
                                            <div class="icon">
                                                <img src="<?php echo e($game->icon); ?>">
                                            </div>

                                        </div>
                                        <span class="d-block mt-2 mb-2"><?php echo e($game->title); ?></span>
                                        <div class="keywords" style="display:none;"><?php echo e($game->keywords); ?></div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    

                    </ul>
                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#products_list li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\D-sherif\game-shop\resources\views/front/index.blade.php ENDPATH**/ ?>