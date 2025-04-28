<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        <?php echo app('translator')->get('site.home'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('admins.admins'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="<?php echo e(route('ad.admins.index')); ?>" class="btn btn-soft-primary">
                                <?php echo app('translator')->get('Back'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('ad.admins.update',$admin->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('admins.name'); ?><span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name',$admin->name)); ?>"
                                        placeholder="name">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('admins.email'); ?><span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email',$admin->email)); ?>"
                                        placeholder="email">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                              <div class="form-group">
                                  <label><?php echo app('translator')->get('users.phone'); ?><span class="text-danger">*</span></label>
                                  <input type="tel" name="phone" class="form-control" value="<?php echo e(old('phone',$admin->phone)); ?>" placeholder="phone"
                                      maxlength="11" minlength="11"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('admins.status'); ?><span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="active" <?php echo e(old('status',$admin->status) == 'active' ? 'selected' : null); ?>><?php echo e(__('Active')); ?></option>
                                        <option value="inactive" <?php echo e(old('status',$admin->status) == 'inactive' ? 'selected' : null); ?>><?php echo e(__('Inactive')); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('admins.password'); ?><span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                        value="<?php echo e(old('password')); ?>" placeholder="password">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('admins.password_confirmation'); ?><span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        value="<?php echo e(old('password_confirmation')); ?>" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(__('admins.image')); ?></label>
                                        <input class="form-control img" name="image"  type="file" accept="image/*" >
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
                                <div class="col-md-4">
                                    <?php if($admin->image): ?>
                                        <img src="<?php echo e(display_file($admin->image)); ?>" alt="<?php echo e($admin->name); ?>" class="img-thumbnail img-preview" width="200px">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('no-image.jpg')); ?>" alt="" class="img-thumbnail img-preview" width="100px">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1"><?php echo app('translator')->get('admins.permissions'); ?></label>
                                        <div class="inp-holder mb-1">
                                            <label for="name"><?php echo e(__('admins.selectall')); ?></label>
                                            <input type="checkbox"  id="selectall" >
                                        </div>
                                        <div class="table-holder">
                                            
                                            <div class="table-responsive">
                                                <table class="table main-table">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo app('translator')->get('roles.model'); ?></th>
                                                            <th><?php echo e(__('admins.selectall')); ?></th>
                                                            <?php $__currentLoopData = $permissionMaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <th><?php echo app('translator')->get('site.' . $value); ?>
                                                                <div style="display:inline-block;">
                                                                      <label class="m-0">
                                                                          <input type="checkbox" value=""  onclick="SelectAll(this)"  class="side-roles" id="side-roles">
                                                                      </label>
                                                                  </div>
                                                              </th>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo app('translator')->get($model . '.' . $model); ?></td>
                                                                <td>
                                                                    <div class="animated-checkbox mx-2" style="display:inline-block;">
                                                                        <label class="m-0">
                                                                            <input type="checkbox" value=""  class="all-roles">
                                                                            <span class="label-text"><?php echo e(__('admins.all')); ?></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <?php $__currentLoopData = $permissionMaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionMap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <td>
                                                                        <div class="animated-checkbox mx-2" style="display:inline-block;">
                                                                            <label class="m-0">
                                                                                <input type="checkbox" value="<?php echo e($permissionMap . '_' . $model); ?>" name="permissions[]"
                                                                                <?php echo e($admin->hasPermission($permissionMap . '_' . $model) ? 'checked' : ''); ?> class="role">
                                                                                <span class="label-text"><?php echo app('translator')->get('site.' . $permissionMap); ?> <?php echo app('translator')->get($model . '.' . $model); ?></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger" style="font-size: 12px"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <!-- end of table -->
                                        </div>
                                    </div>
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
    $(document).ready(function() {
        $('#selectall').click(function(event) {  //on click
            // console.log('hello');
            if(this.checked) { // check select status
                $('.role').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "role"
                });
            }else{
                $('.role').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "role"
                });
            }
            var chkArray = [];
            $("input[name='check[]']:checked").map(function() {
                chkArray.push(this.value);
            }).get();
            var selected;
            selected = chkArray.join(',') + ",";
            // if(selected.length > 1){
            //     alert('هل تريد تحديد الكل?');
            // } else { alert(' تحديد الكل'); }
        });
    });
</script>
<script>
        $(function () {
        $(document).on('change', '.all-roles', function () {
            $(this).parents('tr').find('input[type="checkbox"]').prop('checked', this.checked);
        });
        $(document).on('change', '.role', function () {
            if (!this.checked) {
                $(this).parents('tr').find('.all-roles').prop('checked', this.checked);
            }
            // else{
            //     $(this).parents('tr').find('.all-roles').prop('checked', this.checked);
            // }
        });

    });//end of document ready

</script>
<script>
   function SelectAll(obj) {
       var table = $(obj).closest('table');
       var th_s = table.find('th');
       var current_th = $(obj).closest('th');
       var columnIndex = th_s.index(current_th) + 1;
       table.find('td:nth-child(' + (columnIndex) + ') input').prop("checked", obj.checked);
   }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/admin/admins/edit.blade.php ENDPATH**/ ?>