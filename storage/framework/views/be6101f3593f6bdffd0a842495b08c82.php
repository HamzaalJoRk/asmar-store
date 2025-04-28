<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> | <?php echo app('translator')->get('translation.Edit'); ?> <?php echo app('translator')->get('translation.Games'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        a#add_row {
            width: 50%;
        }
        .img-old {
            margin: auto;
            text-align: center;
            padding: 5px;
        }
        .img-old img {
            max-height: 80px;

        }
        .col-md-2 {
            margin: auto;
        }
        .hr-add{
            border: 0.5px solid #c9c9c9;
            margin: 6px 5%;
            width: 80%;
        }
        .row.card-header {
            background-color: #00000008;
            margin: 0 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('translation.edit'); ?> <?php echo app('translator')->get('translation.Games'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->get('translation.edit'); ?> <?php echo app('translator')->get('translation.Games'); ?>   ( <?php echo e($game->title); ?>)</h4>
                    <form class="needs-validation" novalidate method="post" action="<?php echo e(route('ad.games.update',$game->id)); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('levels.' . $locale . '.leveltitle'); ?><span class="text-danger">*</span></label>
                                            <input type="text" name="<?php echo e($locale); ?>[title]" class="form-control"
                                                   value="<?php echo e(old($locale . '.title',$game->translate($locale)->title)); ?>">
                                            <?php $__errorArgs = [$locale . '.title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger text-bold"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('translation.keywords'); ?> (<?php echo e($locale); ?>)</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="<?php echo app('translator')->get('translation.keywords'); ?>"
                                               required name="<?php echo e($locale); ?>[keywords]"
                                        value="<?php echo e(old($locale.'.keywords',$game->translate($locale)->keywords)); ?>">
                                        <div class="valid-feedback">
                                            <?php echo app('translator')->get('translation.validKeywords'); ?>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo app('translator')->get('translation.invalidKeywords'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('translation.name_currency'); ?> (<?php echo e($locale); ?>)</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="<?php echo app('translator')->get('translation.name_currency'); ?>"
                                               required name="<?php echo e($locale); ?>[name_currency]" value="<?php echo e(old($locale.'.name_currency',$game->translate($locale)->keywords)); ?>">
                                        <div class="valid-feedback">
                                            <?php echo app('translator')->get('translation.validName_currency'); ?>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo app('translator')->get('translation.validName_currency'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02" placeholder="<?php echo app('translator')->get('translation.price_qty'); ?>"
                                           required name="price_qty" step="any" value="<?php echo e(old('price_qty',$game->price_qty)); ?>">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidPrice_qty'); ?>.
                                    </div>
                                </div>
                            </div>
                          


                        </div>

                        <input type="hidden" name="id" value="<?php echo e($game->id); ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.icon'); ?></label>
                                    <input type="file" class="form-control" id="validationCustom02"
                                            name="icon">
                                    <?php if($game->getFirstMediaUrl('icon')): ?>
                                        <div class="img-old">
                                            <img src="<?php echo e($game->getFirstMediaUrl('icon')); ?>" >
                                        </div>
                                    <?php endif; ?>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validIcon'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidIcon'); ?>.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.Background'); ?></label>
                                    <input type="file" class="form-control" id="validationCustom02"
                                            name="background">
                                    <?php if($game->getFirstMediaUrl('background')): ?>
                                        <div class="img-old">
                                            <img src="<?php echo e($game->getFirstMediaUrl('background')); ?>" >
                                        </div>
                                    <?php endif; ?>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validBackground'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidBackground'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.icon_coins'); ?></label>
                                    <input type="file" class="form-control" id="validationCustom02" placeholder="icon coins"
                                            name="icon_coins">
                                    <?php if($game->getFirstMediaUrl('icon_coins')): ?>
                                        <div class="img-old">
                                            <img src="<?php echo e($game->getFirstMediaUrl('icon_coins')); ?>" >
                                        </div>
                                    <?php endif; ?>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validIcon_coins'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidIcon_coins'); ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                    <select class="form-select" id="validationCustom03" required name="is_active">
                                        <option  disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" <?php if($game->is_active): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.active'); ?></option>
                                        <option value="0"<?php if(!$game->is_active): ?>selected  <?php endif; ?> ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validStatus'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidStatus'); ?>

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.is_show'); ?></label>
                                    <select class="form-select" id="validationCustom03" required name="is_show">
                                        <option selected disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" <?php if($game->is_show): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.show'); ?></option>
                                        <option value="0"  <?php if(!$game->is_show): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.hide'); ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validIs_show'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidIs_show'); ?>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check" >
                                        <input class="form-check-input" type="checkbox"  id="need_id_player"  <?php if($game->need_id_player): ?> checked <?php endif; ?> name="need_id_player" value="1" >

                                        <label class="form-check-label" for="need_id_player" >
                                            <?php echo app('translator')->get('translation.need_id_player'); ?>
                                        </label>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check" >
                                        <input class="form-check-input" type="checkbox"  id="need_name_player" name="need_name_player"   <?php if($game->need_name_player): ?> checked <?php endif; ?> value="1" >

                                        <label class="form-check-label" for="need_name_player">
                                            <?php echo app('translator')->get('translation.need_name_player'); ?>
                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row" id="last_row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check " >
                                        <input class="form-check-input" type="checkbox"   <?php if($game->have_packages): ?> checked <?php endif; ?>  id="background_package" name="have_packages" value="1" >

                                        <label class="form-check-label" for="background_package">
                                            <?php echo app('translator')->get('translation.have_packages'); ?>
                                        </label>

                                    </div>

                                </div>
                            </div>


                        </div>



                        <div class="row"   <?php if(!$game->have_packages): ?> style="display: none" <?php endif; ?>  id="btn_add">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.background_package'); ?></label>
                                    <input type="file" class="form-control" id="validationCustom02" placeholder="background package"
                                            name="background_package">
                                    <?php if($game->getFirstMediaUrl('background_package')): ?>
                                        <div class="img-old">
                                            <img src="<?php echo e($game->getFirstMediaUrl('background_package')); ?>" >
                                        </div>
                                    <?php endif; ?>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validBackground_package'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.validBackground_package'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <a class="btn btn-outline-success float-end"  id="add_row">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="col-md-12 row " id="div-append">
                                <?php if($game->have_packages): ?>
                                    <?php $__currentLoopData = $game->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <input type="hidden" name="old_packages[]"  value="<?php echo e($package->id); ?>">
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                                    <input type="number" class="form-control" id="validationCustom02"
                                                           required name="price_qty_package[]" step="any" value="<?php echo e($package->price); ?>">
                                                    <div class="valid-feedback">
                                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.quantity'); ?></label>
                                                    <input type="number" class="form-control" id="validationCustom02"
                                                           required name="quantity_package[]"  value="<?php echo e($package->quantity); ?>">
                                                    <div class="valid-feedback">
                                                        <?php echo app('translator')->get('translation.validQuantity'); ?>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php echo app('translator')->get('translation.invalidQuantity'); ?>.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">

                                                <div class="mb-3">
                                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                                    <select class="form-select" id="validationCustom03" required name="is_active_package[]">
                                                        <option  disabled > <?php echo app('translator')->get('translation.Choose'); ?></option>
                                                        <option value="1" <?php if($package->is_active): ?> selected <?php endif; ?> ><?php echo app('translator')->get('translation.active'); ?></option>
                                                        <option value="0"<?php if(!$package->is_active): ?>selected  <?php endif; ?> ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        <?php echo app('translator')->get('translation.validStatus'); ?>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php echo app('translator')->get('translation.invalidStatus'); ?>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="btn btn-outline-danger"
                                                   id="delete_row">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </div>
                                            <hr class="hr-add">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endif; ?>
                            </div>


                        </div>





                            <br>
                        <div class="mt-5 text-center m-auto">
                            <button class="btn btn-primary" type="submit"><?php echo app('translator')->get('translation.edit'); ?></button>
                        </div>
                    </form>
                    <div class=" d-none"  id="PackageForm-black">
                        <div class="item row d-none"    >
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02"
                                           required name="price_qty_package[]" step="any">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.quantity'); ?></label>
                                    <input type="number" class="form-control" id="validationCustom02"
                                           required name="quantity_package[]">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validQuantity'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidQuantity'); ?>.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.Status'); ?></label>
                                    <select class="form-select" id="validationCustom03" required name="is_active_package[]">
                                        <option selected disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                        <option value="1" ><?php echo app('translator')->get('translation.active'); ?></option>
                                        <option value="0" ><?php echo app('translator')->get('translation.unactive'); ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validStatus'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.invalidStatus'); ?>

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <a class="btn btn-outline-danger"
                                   id="delete_row">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </div>
                            <hr class="hr-add">
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('build/libs/parsleyjs/parsley.min.js')); ?>"></script>

        <script src="<?php echo e(URL::asset('/build/js/pages/form-validation.init.js')); ?>"></script>

    <script>

        $(document).ready(function () {
            $("#need_name_player").change(function () {
                if (this.checked) {
                    $("#show_input_name_player").attr("type", 'text');
                } else {
                    $("#show_input_name_player").attr("type", 'hidden');
                    $("#show_input_name_player").val("");
                }
            });
            $("#need_id_player").change(function () {
                if (this.checked) {
                    $("#show_input_id_player").attr("type", 'text');
                } else {
                    $("#show_input_id_player").attr("type", 'hidden');
                    $("#show_input_id_player").val('');

                    ///clear input  id player   when uncheck

                }
            });

            $("#background_package").change(function () {
                if (this.checked) {
                    var row = $("#PackageForm-black .item").clone();
                    /// append the row row= row.removeClass('d-none')
                     row= row.removeClass('d-none')
                    $('#div-append').append(row);
                    $("#btn_add").css('display','');
                } else {
                    $("#btn_add").css('display','none');

                }
            });
            var i = 1;

            $(document).on("click",'#add_row', function () {


                // clone the row
                var row = $("#PackageForm-black .item").clone();
                row= row.removeClass('d-none')
                /// append the row
                $('#div-append').append(row);

            });
            $(document).on('click', '#delete_row', function () {
                $(this).parent().parent().remove();

            })
        });
    </script>
<?php $__env->stopSection(); ?>



























<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/games/edit.blade.php ENDPATH**/ ?>