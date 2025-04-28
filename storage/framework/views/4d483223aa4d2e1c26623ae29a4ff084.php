

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.my_profile'); ?> <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> <?php echo app('translator')->get('translation.index'); ?>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.my_profile'); ?>  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('front.profile.update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="useremail" class="form-label"><?php echo app('translator')->get('translation.Email'); ?></label>
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="useremail"
                                       value="<?php echo e(old('email',$user->email)); ?>" name="email" placeholder="<?php echo app('translator')->get('translation.Email'); ?>" autofocus required>
                                <?php $__errorArgs = ['email'];
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
                            <div class="col-md-4">
                                <label for="username" class="form-label"><?php echo app('translator')->get('translation.user_name'); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('username',$user->user_name)); ?>" id="username" name="username" autofocus required
                                       placeholder="<?php echo app('translator')->get('translation.user_name'); ?>">
                                <?php $__errorArgs = ['username'];
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
                            <div class="col-md-4">
                                <label class="form-label"><?php echo app('translator')->get('translation.currency'); ?></label>
                                <select class="form-control select2" name="currency_id">
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($currency->id); ?>" <?php if(old('currency_id',$user->currency_id) ==$currency->id ): ?> selected <?php endif; ?>><?php echo e($currency->code); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['currency_id'];
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


                            <div class="col-md-3 pt-2">
                                <label for="user_whatsapp" class="form-label"><?php echo app('translator')->get('translation.user_whatsapp'); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['user_whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="user_whatsapp"
                                       value="<?php echo e(old('user_whatsapp',$user->whats_app)); ?>" name="user_whatsapp" placeholder="<?php echo app('translator')->get('translation.user_whatsapp'); ?>" autofocus required>
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

                            <div class="col-md-3 pt-2">
                                    <label class="form-label"><?php echo app('translator')->get('translation.country'); ?></label>
                                    <select class="form-control select2" id="country_id" name="country_id">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"<?php if(old('country_id',$user->country_id) ==$country->id ): ?> selected <?php endif; ?>><?php echo e($country->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                            </div>
                            <div class="col-md-3 pt-2">
                                <label class="form-label"><?php echo app('translator')->get('translation.city'); ?></label>
                                <select class="form-control select2" id="city_id" name="city_id">
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>"<?php if(old('city_id',$user->city_id) ==$city->id ): ?> selected <?php endif; ?>><?php echo e($city->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3 pt-2">
                                    <label for="city"><?php echo app('translator')->get('translation.area'); ?></label>
                                    <input name="city" value="<?php echo e(old('area',$user->area)); ?>" required="" class="form-control" id="city" type="text" placeholder="<?php echo app('translator')->get('translation.area'); ?>">
                            </div>
                            <div class="col-md-4 pt-2">
                                        <label for="address"><?php echo app('translator')->get('translation.address'); ?></label>
                                        <input name="address" value="<?php echo e(old('address',$user->address)); ?>" required="" class="form-control" id="address" type="address" placeholder="<?php echo app('translator')->get('translation.address'); ?>">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('users.image'); ?></label>
                                    <input type="file" name="image" class="form-control img" accept="image/*">
                                    <div class="col-md-4">
                                        <?php if($user->avatar): ?>
                                            <img src="<?php echo e(asset($user->avatar)); ?>" alt="<?php echo e($user->name); ?>" class="img-thumbnail img-preview" width="200px">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('no-image.jpg')); ?>" alt="" class="img-thumbnail img-preview" width="100px">
                                        <?php endif; ?>
                                    </div>
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i><?php echo app('translator')->get('Edit'); ?></button>
                        </div>
                    </form>
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

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\hamza\new-store\resources\views/front/profile/edit.blade.php ENDPATH**/ ?>