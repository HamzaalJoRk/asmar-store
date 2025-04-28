<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.create transactions'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

    <style>
        .card-login {
            max-width: 25rem;
        }
        span#amount {
            min-height: 36.5px;
        }
        button.btn.btn-primary.btn-block {
            width: 50%;
            margin: auto;
            margin-top: 10px;
        }
    </style>
    <?php if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl'): ?>
        <style>
            body{
                direction: rtl;
                text-align: right;
            }

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
        <?php $__env->slot('title'); ?> <?php echo app('translator')->get('translation.create transactions'); ?>  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="card card-login mx-auto mt-5">
            <div class="card-body ">
                <div class="alert alert-info mt-2"><li class="mt-2">يرجى إرسال المبلغ المطلوب إلى العنوان:<br>
                        <strong>
                            <a href="#" onclick="return copyToClipboard(this);">
                                <?php echo e($bank->address); ?>

                                <i class="fa fa-copy pr-1"></i></a>
                        </strong>
                        <br>
                        ومن ثم التبليغ عن الدفعة هنا
                    </li>
                    <li class="mt-2">عند ايداعك أي مبلغ من خلال بوابة الدفع هذه سيتم اقتطاع
                        <b><?php echo e($bank->fee_percentage); ?>%</b> عمولة من مبلغ الحوالة</li>
                    <li class="mt-2"> الحد الأدنى للإرسال هو  <?php echo e(get_helper_price($bank->minimum_payment,true)); ?> </li>
                    <li class="mt-2">الحد القصي للإرسال هو  <?php echo e(get_helper_price($bank->limit_payment,true)); ?></li>
                </div>
                <div class="alert alert-warning mt-2">استلام المبالغ من الساعه 10 صباحاً حتى 7 مساء<br>
                    <br>  يوم الجمعة إجازة</div>
                <form method="post" class="addpayment" action="<?php echo e(route('front.transactions.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="name">اسم صاحب الحساب</label>
                                <input type="text"  value="<?php echo e(old('name')); ?>"  name="name" id="name" class="form-control" placeholder="اسم صاحب الحساب">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <br><span class="alert alert-danger" >
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="address">حساب المرسل</label>
                                <input type="text" value="<?php echo e(old('address')); ?>" name="address" id="address" class="form-control" placeholder="رقم الحساب / البريد الالكتروني / عنوان محفظة المرسل">
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <br><span class="alert alert-danger" >
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col">
                                <label class="form-label">العملة</label>
                                <select class="form-control select2" name="currency_id">
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($currency->id); ?>" <?php if(old('currency_id') == $currency->id): ?>  selected <?php endif; ?>><?php echo e($currency->code); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <br><span class="alert alert-danger" >
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col">
                                <label for="original_amount">المبلغ</label>
                                <input name="original_amount" value="<?php echo e(old('original_amount')); ?>"  required="" class="form-control" id="original_amount" step="any" type="number">
                                <?php $__errorArgs = ['original_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <br><span class="alert alert-danger" >
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col">
                                <label for="amount">قيمة الرصيد المضاف</label>
                                <span   class="form-control" id="amount" >

                                </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="date">التاريخ</label>
                                <input type="datetime-local" required="" autocomplete="off" name="date" id="date" class="form-control" placeholder="التاريخ" value=" <?php echo e(old('date')); ?>">
                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <br><span class="alert alert-danger" >
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <input type="hidden" required="" name="payment_gateway" value="<?php echo e($bank->id); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details">ملاحظات</label>
                            <textarea name="details"  class="form-control" id="details" placeholder="أدخل الملاحظات">
                                    <?php echo e(old('details')); ?>

                            </textarea>
                            <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <br><span class="alert alert-danger" >
                                    <?php echo e($message); ?>

                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="d-flex">

                        <button type="submit" name="add" class="btn btn-primary btn-block">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    function copyToClipboard(element) {
        var aux = document.createElement("div");
        aux.setAttribute("contentEditable", true);
        aux.innerHTML = element.innerHTML;
        aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)");
        document.body.appendChild(aux);
        aux.focus();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    <?php if(old('original_amount')): ?>
        getFeeAmount(<?php echo e(old('original_amount')); ?>);
    <?php endif; ?>
    $('#original_amount').on('input', function(){
        var element_amount=$(this).val();
        getFeeAmount(element_amount);
    });

    function getFeeAmount(element_amount){
        var fee_percentage=<?php echo e($bank->fee_percentage); ?>;

        var amount=element_amount - ((fee_percentage / 100 )*element_amount);


        $('#amount').text(amount);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mobilegs/public_html/resources/views/front/transactions/step-two.blade.php ENDPATH**/ ?>