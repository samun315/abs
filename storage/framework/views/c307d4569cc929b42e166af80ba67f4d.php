<!--begin::Modal - New module-->
<div class="modal fade" id="showModal" data-keyboard="false" data-bs-backdrop="static">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-lg">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="submitForm">

                <?php echo csrf_field(); ?>
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2 class="menuItemTitle"></h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 formReset" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fas fa-times"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <div class="row mb-5">

                        <input type="text" hidden name="menu_item_id" id="kt_menu_item_id">
                        <input type="text" hidden name="menu_id" id="kt_menu_id" value="<?php echo e($menuInfos?->menu_id); ?>">
                        <input type="text" hidden id="hidden_module_item_id">
                        <input type="text" hidden id="hidden_parent_id">

                        
                        <div class="col-md-12 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Type</label>
                            <select name="type" id="kt_type"
                                class="form-select form-select-solid <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                data-control="select2" data-placeholder="Select Type" data-dropdown-parent="#showModal">
                                <option value=""></option>
                                <option value="divider">Divider</option>
                                <option value="parent">Parent</option>
                                <option value="menu_item">Menu Item</option>
                            </select>
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Module Name</label>
                            <select name="module_id" id="kt_module_id"
                                class="form-select form-select-solid <?php $__errorArgs = ['module_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                data-control="select2" data-placeholder="Select Module"
                                data-dropdown-parent="#showModal">
                                
                                <option value=""></option>
                                <?php $__currentLoopData = $menuModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuModule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('module_id') ? 'selected' : ''); ?>

                                        value="<?php echo e($menuModule->module_id ?? old('module_id')); ?>">
                                        <?php echo e($menuModule->module_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6 fv-row mb-5 moduleItemId">
                            <label class="required fs-5 fw-bold mb-2">Module Item Name</label>
                            <select name="module_item_id" id="kt_module_item_id"
                                class="form-select form-select-solid <?php $__errorArgs = ['module_item_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                data-control="select2" data-placeholder="Select Module Item"
                                data-dropdown-parent="#showModal">
                                <option value=""></option>
                                <?php $__currentLoopData = $moduleItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('module_item_id') ? 'selected' : ''); ?>

                                        value="<?php echo e($moduleItem->item_id ?? old('module_item_id')); ?>">
                                        <?php echo e($moduleItem->item_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6 fv-row mb-5 parentId">
                            <label class="fs-5 fw-bold mb-2">Parent</label>
                            <select name="parent_id" id="kt_parent_id"
                                class="form-select form-select-solid <?php $__errorArgs = ['parent_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                data-control="select2" data-placeholder="Select Parent"
                                data-dropdown-parent="#showModal">
                                <option value=""></option>
                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('parent_id') ? 'selected' : ''); ?>

                                        value="<?php echo e($parent?->menu_item_id ?? old('parent_id')); ?>">
                                        <?php echo e($parent?->menu_item_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6 fv-row mb-5 name">
                            <label class="required fs-5 fw-bold mb-2">Name</label>
                            <input type="text" name="menu_item_name" id="kt_name"
                                class="form-control form-control-solid <?php $__errorArgs = ['menu_item_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter Item Name" />
                        </div>

                        <div class="col-md-6 fv-row mb-5 url">
                            <label class="fs-5 fw-bold mb-2">Url</label>
                            <input type="text" name="url" id="kt_url"
                                class="form-control form-control-solid <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter Url" />
                        </div>

                        <div class="col-md-6 fv-row mb-5 iconClass">
                            <label class="required fs-5 fw-bold mb-2">Icon Class</label>
                            <input type="text" name="icon_class" id="kt_icon_class"
                                class="form-control form-control-solid <?php $__errorArgs = ['icon_class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter Icon Class" />
                        </div>

                        <div class="col-md-6 fv-row mb-5 target">
                            <label class="fs-5 fw-bold mb-2">Target</label>
                            <input type="text" name="target" id="kt_target"
                                class="form-control form-control-solid <?php $__errorArgs = ['target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter Target" />
                        </div>

                        <div class="col-md-6 fv-row mb-5 active">
                            <label class="required fs-5 fw-bold mb-2">Active</label>
                            <select name="active" id="active"
                                class="form-select form-select-solid <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                data-control="select2" data-placeholder="Select Status"
                                data-dropdown-parent="#showModal">
                                <option value=""></option>
                                <option value="YES"> YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="col-md-12 d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-light me-2 formReset" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-sm fs-6 btn-primary btnSubmit">
                            </button>
                        </div>
                    </div>
                </div>
                <!--end::Modal body-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New module-->
<?php /**PATH D:\xampp\htdocs\abs\resources\views/menu/menuItem/modal/addMenuItemModal.blade.php ENDPATH**/ ?>