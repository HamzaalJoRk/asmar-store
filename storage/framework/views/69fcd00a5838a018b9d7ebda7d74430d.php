

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.index'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <style>
        .card-login{
            max-width:none;
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
        .products_list{
            width:100%;
            padding:0;
            list-style:none;
            text-align:center;
        }
        .products_list li{
            width:32.33%;
            margin-top:18px;
            flex: 1 1 25em;
            list-style-type: none;
            display: inline-block;
            max-width:125px;
        }
        .products_list li a{
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
        .products_list li a .name_wrp{
            background-color: #aaa;
            padding: 1.5em 0 1.5em 0;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            background-position: center;
            transition: .3s;
        }
        .products_list li a .name_wrp .icon{
            flex: none;
            float:right;
            margin: 0 auto;
        }
        .products_list li a .name_wrp .icon img{
            height:60px;
        }
        .products_list li a .name_wrp .name{
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
        .checkout .name_wrp{
            width:100px;
            height:100px;
            background-color: white !important;
        }
        .checkout .products_list li a .name_wrp .icon img{
            height:25px;
        }
        .checkout .products_list li {
            max-width: 125px;
            opacity: 80%;
            cursor: pointer;
        }

        .checkout .products_list li a{
            box-shadow:none;
            margin:0.2em;
        }
        .checkout .name_wrp .icon{
            position:absolute;
            top:0px;
            left:0px;
        }
        .checkout .name_wrp .checked{
            position:absolute;
            top:0px;
            right:0px;
            display:none;
        }
        .checkout .name_wrp .statusbadge{
            position:absolute;
            top:0px;
            right:0px;
        }
        .checkout .name_wrp .text{
            float: right;
            margin: 0 auto;
            font-weight: 700;
            font-size:12px;
            direction: ltr;
            width: 81px;
            text-align: center;
        }
        a.disabled{
            cursor: not-allowed;
        }
        .checkout .product_group .price{
            font-size:17px;
            text-align:center;
        }
        .product-icon img{
            max-width:20px;
        }
        @media (max-width: 420px) and (min-width: 400px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 400px) and (min-width: 380px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 380px) and (min-width: 360px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 360px) and (min-width: 340px) {
            .checkout .products_list li{
                margin-right:0%;
            }
        }
        @media (max-width: 340px) and (min-width: 320px) {
            .checkout .products_list li{
                margin-right:3%;
            }
        }
        @media (max-width: 320px) and (min-width: 310px) {
            .checkout .products_list li{
                margin-right:1%;
            }
        }
        @media (max-width: 310px) {
            .checkout .products_list li{
                margin: 0 auto;
            }
        }
        .product_group.disabled{
            opacity: 0.4;
        }
        .product_group.disabled.noopacity{
            opacity: 1;
        }
        .banner img{
            border-radius: 5px;
            max-width:368px;
        }
        #neworder .alert{
            width:100%;
        }
        .slider{
            width:100%;
            max-height:380px;
            overflow:hidden;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .slide-item{
            width:100%;
            overflow:hidden;
            background-size: cover !important;
            height: calc(100vw / 100 * 17);
            transition: background-image ease 1000ms;
        }
        @media (min-width: 1900px){
            .slide-item {
                height: calc((100vw / 100) * 21);
            }
        }
        @media (min-width: 1367px){
            .slide-item {
                height: calc((100vw / 100) * 19);
            }
        }
        @media (max-width: 991px) {
            .slide-item{
                height: calc((100vw / 100) * 27);
            }
        }
        @media (max-width: 600px) {
            .slide-item{
                height: calc((100vw / 100) * 30);
                background-size:100% calc((100vw / 100) * 30) !important;
            }
        }
        .processing-method img{
            max-width:21px;
        }
        span.statusbadge.badge.badge-danger {
            padding-bottom: 4px;
            background-color: #d72e2e;
        }
        i.fa.fa-refresh {
            font-size: 25px;
        }
        .pull-right {
            float: left;
        }
        .pull-left {
            float: right;
        }
        span.alert.alert-danger {
            margin-top: 5px !important;
            display: block;
        }
    </style>

    <?php if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl'): ?>
        <style>
            .pull-right {
                float: right;
            }
            .pull-left {
                float: left;
            }
            strong.product-name {
                margin-right: 10px;
            }
        </style>
    <?php else: ?>
        <style>
            strong.product-name {
                margin-left: 10px;
            }
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
    <div class="container-fluid">
        <form method="post" action="<?php echo e(route('front.game.order')); ?>" id="neworder">
            <?php echo csrf_field(); ?>
            <div class="checkout form-group">
                <div class="form-row">
                    <div class="col">
                        <ul class="products_list">
                            <?php if($game->have_packages): ?>
                                <?php $__currentLoopData = $game->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="package" onclick="changePackage(<?php echo e($package->id); ?>,<?php echo e($package->quantity); ?>,<?php echo e(get_helper_price($package->price,false)); ?>)">
                                        <a  data-id="<?php echo e($package->id); ?>" data-price="<?php echo e(get_helper_price($package->price,false)); ?> " data-group="pubg" class="product_group <?php if(!$package->is_active || !$game->is_active): ?> disabled <?php endif; ?> ">
                                            <div class="name_wrp" style="background-image:url(<?php echo e($game->background_package); ?>);">
                                                <div class="text"><?php echo e($game->title); ?> <?php echo e($package->quantity); ?> <?php echo e($game->name_currency); ?></div>
                                                <div class="clear"></div>
                                                <div class="icon">
                                                    <img src="<?php echo e($game->icon_currancy); ?>">
                                                </div>
                                                <div class="checked" id="package-checked-<?php echo e($package->id); ?>">
                                                    <i class="fa fa-check text-success " style="font-size: 17px;font-weight: 900;"></i>
                                                </div>
                                                <?php if(!$package->is_active || !$game->is_active): ?>
                                                    <span class="statusbadge badge badge-danger"><?php echo e(__('translation.unavailable')); ?></span>
                                                <?php endif; ?>

                                            </div>
                                            <div class="price">
                                                <?php echo e(get_helper_price($package->price,true)); ?>

                                                <br>



                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                        <?php $__errorArgs = ['package_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="alert alert-danger ">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                    <input type="hidden" id="qty_item" name="qty_item"  value="<?php echo e($game->have_packages ? 0 : 1); ?>">



                <div class="form-row">
                    <div class="col">

                        <input type="hidden" id="game_id" name="game_id" value="<?php echo e($game->id); ?>">
                        <input type="hidden" id="package_id" name="package_id" value="">
                    </div>
                </div>
                <div class="form-row row" id="checkout">
                    <div class="w-100 alert alert-info customAmount d-none pull-right">
                        <div class="pull-right w-100"> <?php echo e(__('translation.Enter the quantity to be purchased')); ?></div>
                    </div>
                    <div class="col-6">
                        <label for="qty"><?php echo e(__('translation.qty')); ?></label>
                        <input name="qty" value="1" class="form-control" id="qty" type="number" placeholder="<?php echo e(__('translation.qty')); ?>">
                        <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="alert alert-danger ">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>
                    <div class="col-6">
                        <label for="total"><?php echo app('translator')->get('translation.final_total'); ?></label>
                        <input name="total" value="<?php echo e(number_format($game->price_qty,10)); ?>" class="form-control" id="total" type="number" disabled>
                        
                        <!-- Hidden fields for calculations -->
                        <input name="base_total" value="<?php echo e(number_format($game->price_qty,10)); ?>" class="form-control d-none" id="base_total" type="hidden">
                        <input name="profit_percentage" value="<?php echo e(auth()->check() ? auth()->user()->level->profit_percentage : 0); ?>" class="form-control d-none" id="profit_percentage" type="hidden">
                        <input name="profit_amount" value="0" class="form-control d-none" id="profit_amount" type="hidden">
                        <input name="final_total" value="<?php echo e(number_format($game->price_qty,10)); ?>" class="form-control d-none" id="final_total" type="hidden">
                        <input name="price_item" value="<?php echo e(number_format($game->price_qty,10)); ?>" class="form-control" id="price_item" type="hidden">
                        <input name="currency_code" value="<?php echo e(get_currency_code()); ?>" class="form-control" id="currency_code" type="hidden">
                    </div>
                </div>
                <div class="row player_info">
                    <?php if($game->need_id_player): ?>
                    <div class="col-6">
                        <label for="playerid"><?php echo e(__('translation.playerid')); ?></label>
                        <input name="playerid" type="tel" value="" class="form-control" required="" id="playerid" placeholder="<?php echo e(__('translation.playerid')); ?>">
                        <?php $__errorArgs = ['playerid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="alert alert-danger ">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <?php endif; ?>

                    <?php if($game->need_name_player): ?>
                        <div class="col-6">
                            <label for="playername"><?php echo e(__('translation.playername')); ?></label>
                            <div style="display: flex;">
                                <input name="playername" value="" class="form-control" id="playername" type="text" >
                                <a href="#" id="reset_player_name" class="pull-right mr-2" style="display:none;"><i class="fa fa-times"></i></a>
                            </div>
                            <?php $__errorArgs = ['playername'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="alert alert-danger ">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="alert-wrap mt-3 checkout">
                <div class="alert alert-success product-info">
                    <span class="pull-left total_q" style="font-size:1em;"></span>




                    <span class="product-qty">

                        </span>
                    </span>
                    <strong class="product-name mr-2 ml-2"><?php echo e($game->title); ?> <span class="package-qty">

                        </span>  <?php echo e($game->name_currency); ?></strong>
                    <span>
                    <div class="pull-right product-icon">

                        <img src="<?php echo e($game->icon_currancy); ?>">
                        x
                    </div>
                </div>
            </div>
            <div>
                <div class="alert alert-info w-100 processing-method automatic pull-right">
                    <div class="pull-right w-100">
                        <img src="https://alza3eem.shop/img/smile.png">
                        &nbsp;
                        <?php echo e(__('translation.This product operates automatically, 24 hours a day, all year round')); ?></div>
                </div>

            </div>
            <div class="form-group">
                <label for="note"><?php echo e(__('translation.notes')); ?>:</label>
                <textarea name="note" class="form-control" id="note" placeholder="<?php echo e(__('translation.Insert a note for the sales team (optional)')); ?>"></textarea>
            </div>

        </form>
        <div class="row mt-3">
            <?php if(auth()->guard()->check()): ?>
                <button type="submit" name="add"
                        class="btn btn-primary btn-block checkout w-50 m-auto"
                id="submit"><?php echo e(__('translation.add')); ?></button>
            <?php elseif(auth()->guard()->check()): ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>



    <!-- Sweet Alerts js -->
    <script src="<?php echo e(asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <?php if(session()->has('error_m')): ?>
        <script>
            Swal.fire({
                title: '<?php echo e(__('translation.error')); ?>',
                text: '<?php echo e(session()->get('error_m')); ?>',
                icon: 'error',
            })
        </script>
    <?php endif; ?>

    <?php if(session()->has('message')): ?>
        <script>
            Swal.fire({
                title:"<?php echo e(__('translation.done')); ?>",
                text:"<?php echo e(session()->get('message')); ?>",
                icon:"success"
            })

        </script>
    <?php endif; ?>
    <script>
        <?php if(!$game->have_packages): ?> getQty(); <?php endif; ?>
        function changePackage (id,qty,price_item){
            $('.package .checked').hide();
            $('#package-checked-'+id).show();
            $('#package_id').val(id);
            $('#qty_item').val(qty);
            $('#price_item').val(price_item)
            getQty();
        }
        function getQty (){
            var qty = $('#qty').val();
            var have_packages=<?php echo e($game->have_packages); ?>;
            var qty_item = $('#qty_item').val();
            var currency_code = $('#currency_code').val();
            if(qty_item <= 0 || qty_item === '' ){
                Swal.fire({
                    title: '<?php echo e(__('translation.error')); ?>',
                    text: '<?php echo e(__('translation.please_chose_items_first')); ?>',
                    icon: 'error',
                })
            }
          
            if(have_packages === 1){
                var qty_all = qty * qty_item;
                $('.package-qty').html(qty_item);
                $('.product-qty').html(qty);
            }else{
                $('.package-qty').hide();
                $('.product-qty').html(qty);
            }
            
            var base_price = $('#price_item').val();
            var profit_percentage = parseFloat($('#profit_percentage').val()) || 0;
            
            // حساب السعر النهائي مباشرة مع الربح
            var final_price = base_price * (1 + (profit_percentage / 100));
            var total = (qty * final_price).toFixed(10);
            
            // تحديث السعر النهائي فقط في الواجهة
            $('#total').val(total);
            $('.total_q').text(total + currency_code);
            
            // تحديث الحقول المخفية للحسابات الداخلية
            $('#base_total').val((qty * base_price).toFixed(10));
            $('#profit_amount').val((total - (qty * base_price)).toFixed(10));
            $('#final_total').val(total);
        }

        $(document).ready(function(){
            $('#qty').keyup(function(){
                getQty();
            });
            $('#submit').click(function() {
                var qty_item = $('#qty_item').val();
                if(qty_item <= 0 || qty_item === '' ){
                    Swal.fire({
                        title: '<?php echo e(__('translation.error')); ?>',
                        text: '<?php echo e(__('translation.please_chose_items_first')); ?>',
                        icon: 'error',
                    })
                }else{
                    $('#neworder').submit();
                }
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\hamza\new-store\resources\views/front/games/show.blade.php ENDPATH**/ ?>