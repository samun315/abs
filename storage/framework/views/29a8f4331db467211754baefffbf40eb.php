<?php $__env->startSection('title', 'Add Balance'); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/custom/css/order/style.css')); ?>"
        <?php echo e(Sri::html('assets/custom/css/order/style.css')); ?> rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal518dae97e09a2170c801e9ed31398b56 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal518dae97e09a2170c801e9ed31398b56 = $attributes; } ?>
<?php $component = App\View\Components\ToolbarComponent::resolve(['title' => 'Add Balance','breadcrumbs' => [
        ['label' => 'Home', 'url' => route('dashboard')],
        ['label' => 'Order Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Order', 'url' => 'javascript:void(0)'],
        ['label' => 'Add Balance', 'active' => true],
    ],'actionUrl' => ''.e(route('marchant.order.balance.index')).'','actionIcon' => 'fas fa-table','actionLabel' => 'Order list'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toolbar-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ToolbarComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal518dae97e09a2170c801e9ed31398b56)): ?>
<?php $attributes = $__attributesOriginal518dae97e09a2170c801e9ed31398b56; ?>
<?php unset($__attributesOriginal518dae97e09a2170c801e9ed31398b56); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal518dae97e09a2170c801e9ed31398b56)): ?>
<?php $component = $__componentOriginal518dae97e09a2170c801e9ed31398b56; ?>
<?php unset($__componentOriginal518dae97e09a2170c801e9ed31398b56); ?>
<?php endif; ?>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <form method="POST" action="<?php echo e(route('marchant.order.balance.store')); ?>" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-5 row">
                                <div class="col-md-12">
                                    <label class="required fs-5 fw-bold mb-2">Payment Gateway</label>
                                    <?php $__currentLoopData = $paymentGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="payment-option text-left" for="payment_gateway_<?php echo e($gateway->id); ?>">
                                            <input type="radio" class="payment_gateway" name="payment_gateway_id"
                                                value="<?php echo e($gateway->id); ?>" id="payment_gateway_<?php echo e($gateway->id); ?>" hidden>
                                            <div class="payment-box">
                                                <span class="payment-text"><?php echo e(strtoupper($gateway->gateway_name)); ?>

                                                    (<?php echo e($gateway->currency_code); ?>)
                                                </span>
                                                <span class="checkmark">&#10004;</span>
                                            </div>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="col-md-12 fv-row mb-5 amount_div">
                                    <label class="required fs-5 fw-bold mb-2">Amount</label>
                                    <input type="number" name="amount" id="kt_amount" step="0.0001"
                                        class="form-control form-control-solid amount bg-gradient <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Enter Amount" autocomplete="off" required />
                                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-12 fv-row mb-5 amount_div">
                                    <label class="required fs-5 fw-bold mb-2">Transaction ID/Reference ID</label>
                                    <input type="text" name="transaction_id" id="kt_transaction_id"
                                        class="form-control form-control-solid transaction_id bg-gradient <?php $__errorArgs = ['transaction_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Enter Transaction ID/Reference ID" autocomplete="off" required />
                                    <?php $__errorArgs = ['transaction_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-12 fv-row mb-5 amount_div">
                                    <label class="required fs-5 fw-bold mb-2">Upload Attachment</label>
                                    <input type="file" id="kt_attachment"
                                        class="form-control form-control-solid <?php $__errorArgs = ['attachment_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="attachment_url" />
                                    <?php $__errorArgs = ['attachment_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-7 row detailsDiv">
                                <div class="col-md-12 mt-9">
                                    <table class="table border border-2 table-row-dashed table-row-gray-300">
                                        <tr class="highlight text-white">
                                            <th class="ps-2">FIELD</th>
                                            <th>INFORMATION</th>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Please Send Balance</td>
                                            <td>TK <span class="bd_amount"></span> <span class="kt_currency">BDT</span></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Gateway</td>
                                            <td class="gateway_name_column"></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Currency</td>
                                            <td>
                                                <span class="kt_currency"></span><br>
                                                Rate : 💎 1 IMO Diamond = <span class="rate-box"></span> <span
                                                    class="kt_currency"></span>
                                                <input type="text" hidden name="rate" id="kt_rate">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Amount <span class="kt_currency"></span> to IMO Diamond</td>
                                            <td>
                                                <input type="text" hidden name="diamond_quantity"
                                                    id="kt_diamond_quantity">
                                                Amount <span class="kt_currency">BDT</span> <span class="bd_amount"></span>
                                                TK = 💎 <span class="diamond_amount"></span> IMO Diamond
                                            </td>
                                        </tr>
                                        <tr class="highlight text-white">
                                            <th class="ps-2" colspan="2">Gateway Details</th>
                                        </tr>
                                        <tr class="border-0">
                                            <th class="ps-2" colspan="2"><strong class="gateway_details"></strong></th>
                                        </tr>
                                        <tr class="border-0">
                                            <td class="ps-2" colspan="2"><strong>Uploaded Attachment:</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <img id="preview" src="" alt="Image Preview">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 fv-row mb-5"></div>
                                <div class="col-md-3 fv-row mb-5 d-grid">
                                    <button type="submit" class="btn btn-primary me-5">Request For Order</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_script'); ?>

    <!-- begin::Page Custom Stylesheets(used by this page) -->
    <script src="<?php echo e(asset('assets/custom/js/marchant/order/index.js')); ?>"
        <?php echo e(Sri::html('assets/custom/js/marchant/order/index.js')); ?>></script>
    <!--end::Page Custom Stylesheets(used by this page)-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\abs\resources\views/marchant/order/create.blade.php ENDPATH**/ ?>