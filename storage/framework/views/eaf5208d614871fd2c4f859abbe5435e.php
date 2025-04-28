

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.home'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <body data-sidebar="dark" data-layout-scrollable="true">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class=" alert alert-warning">
                                <div class="row">
                                    <strong>
                                        <i class="fa fa-info-circle"></i>
                                        <?php echo e(__('translation.Important note')); ?>:</strong>

                                    <?php echo e(__('translation.Any account whose information does not match will be suspended by the administration')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">

                            <div class="p-2">
                                <form method="POST" class="form-horizontal" action="<?php echo e(route('front.completeRegister.Post')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="user_whatsapp" class="form-label"><?php echo app('translator')->get('translation.user_whatsapp'); ?></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['user_whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="user_whatsapp"
                                               value="<?php echo e(old('user_whatsapp')); ?>" name="user_whatsapp" placeholder="<?php echo app('translator')->get('translation.user_whatsapp'); ?>" autofocus required>
                                        <?php $__errorArgs = ['user_whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label"><?php echo app('translator')->get('translation.country'); ?></label>
                                            <select class="form-control select2" id="country_id" name="country_id">
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label"><?php echo app('translator')->get('translation.city'); ?></label>
                                            <select class="form-control select2" id="city_id" name="city_id">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mt-2">
                                        <div class="col">
                                            <label for="city"><?php echo app('translator')->get('translation.area'); ?></label>
                                            <input name="city" value="" required="" class="form-control" id="city" type="text" placeholder="<?php echo app('translator')->get('translation.area'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="address"><?php echo app('translator')->get('translation.address'); ?></label>
                                                <input name="address" value="" required="" class="form-control" id="address" type="address" placeholder="<?php echo app('translator')->get('translation.address'); ?>">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                                type="submit"><?php echo app('translator')->get('translation.Save'); ?></button>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    function getCitise() {
      var country_id = $('#country_id').val();
        $.ajax({
            url: "<?php echo e(route('front.getCities','')); ?>/"+country_id,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                var cities = res.cities;
                $("#city_id")
                    .empty();
                cities.forEach((city) => {

                    $("#city_id").append(new Option(city.title, city.id));

                });
            }
        });
    }
    $(document).ready(function() {
        getCitise();
        $('#country_id').on('change', function() {
           getCitise();
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u187789736/domains/asmar-card.com/public_html/resources/views/auth/complete.blade.php ENDPATH**/ ?>