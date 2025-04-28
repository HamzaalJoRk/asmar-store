<div class="row">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title"> <?php echo app('translator')->get('translation.Add'); ?> <?php echo app('translator')->get('translation.Games'); ?></h4>
                <form class="needs-validation" novalidate method="post" action="<?php echo e(route('ad.games.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                            <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('levels.' . $locale . '.leveltitle'); ?><span class="text-danger">*</span></label>
                                            <input type="text" name="<?php echo e($locale); ?>[title]" class="form-control"
                                                   value="<?php echo e(old($locale . '.title')); ?>">
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
                                           required name="<?php echo e($locale); ?>[keywords]">
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
                                           required name="<?php echo e($locale); ?>[name_currency]">
                                    <div class="valid-feedback">
                                        <?php echo app('translator')->get('translation.validName_currency'); ?>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo app('translator')->get('translation.validName_currency'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.price_qty'); ?></label>
                                <input type="number" class="form-control" id="validationCustom02" placeholder="<?php echo app('translator')->get('translation.price_qty'); ?>"
                                       required name="price_qty" step="any">
                                <div class="valid-feedback">
                                    <?php echo app('translator')->get('translation.validPrice_qty'); ?>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo app('translator')->get('translation.invalidPrice_qty'); ?>.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.min_qty'); ?></label>
                                <input type="number" class="form-control" id="validationCustom02" placeholder="<?php echo app('translator')->get('translation.min_qty'); ?>"
                                       required name="min_qty">
                                <div class="valid-feedback">
                                    <?php echo app('translator')->get('translation.validMin_qty'); ?>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo app('translator')->get('translation.invalidMin_qty'); ?>.
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.icon'); ?> <span class="text-danger">(1:1)</span></label>
                                <input type="file" class="form-control" id="validationCustom02"
                                       required name="icon">
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
                                <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.Background'); ?><span class="text-danger">(163px * 115px )</span></label>
                                <input type="file" class="form-control" id="validationCustom02"
                                       required name="background">
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
                                <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.icon_coins'); ?><span class="text-danger">(1:1 )</span></label>
                                <input type="file" class="form-control" id="validationCustom02" placeholder="icon coins"
                                       required name="icon_coins">
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

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="validationCustom03" class="form-label"><?php echo app('translator')->get('translation.is_show'); ?></label>
                                <select class="form-select" id="validationCustom03" required name="is_show">
                                    <option selected disabled value=""> <?php echo app('translator')->get('translation.Choose'); ?></option>
                                    <option value="1" ><?php echo app('translator')->get('translation.show'); ?></option>
                                    <option value="0" ><?php echo app('translator')->get('translation.hide'); ?></option>
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
                                    <input class="form-check-input" type="checkbox"  id="need_id_player" name="need_id_player" value="1" >

                                    <label class="form-check-label" for="need_id_player">
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
                                    <input class="form-check-input" type="checkbox"  id="need_name_player" name="need_name_player" value="1" >

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
                                    <input class="form-check-input" type="checkbox"  id="background_package" name="have_packages" value="1" >

                                    <label class="form-check-label" for="background_package">
                                        <?php echo app('translator')->get('translation.have_packages'); ?>
                                    </label>

                                </div>

                            </div>
                        </div>


                    </div>



                    <div class="row card" style="display: none" id="btn_add">
                        <div class="row card-header">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">  <?php echo app('translator')->get('translation.background_package'); ?><span class="text-danger">(1:1)</span> </label>
                                    <input type="file" class="form-control" id="validationCustom02" placeholder="background package"
                                            name="background_package" >
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
                        </div>

                        <div class="col-md-12 row card-body" id="div-append">
                           
                        </div>


                    </div>







                    <div>
                        <button class="btn btn-primary" type="submit"><?php echo app('translator')->get('translation.create'); ?></button>
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
                     row= row.removeClass('d-none');
                    /// append the row
                    $('#div-append').append(row);
                    $("#btn_add").css('display','');
                } else {
                    $("#btn_add").css('display','none');
                    $('#div-append').html(''); 

                }
            });

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

<?php /**PATH /home/u187789736/domains/zain-market.com/public_html/resources/views/admin/games/add.blade.php ENDPATH**/ ?>