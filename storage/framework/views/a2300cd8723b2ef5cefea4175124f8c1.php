<!--begin::Modal - New module-->
<div class="modal fade" id="showModal" data-keyboard="false" data-bs-backdrop="static">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="javascript:void(0)" id="submitForm">

                <?php echo csrf_field(); ?>
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2 id="modalTitle"></h2>
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

                        <input type="text" hidden name="menu_id" id="kt_menu_id">

                        <div class="col-md-12 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Menu Name</label>
                            <input type="text"
                                class="form-control form-control-solid <?php $__errorArgs = ['menu_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Enter Menu Name" name="menu_name" id="kt_name" />
                        </div>

                        <div class="col-md-12 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Description</label>
                            <textarea type="text" class="form-control form-control-solid <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Write Description" name="description" id="kt_description"></textarea>
                        </div>

                        <div class="col-md-12 fv-row mb-5">
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
                    </div>
                    <!--begin::Button-->

                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-light me-2 formReset" data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-sm fs-6 btn-primary btnSubmit">
                        </button>
                    </div>
                    <!--end::Button-->
                </div>
                <!--end::Modal body-->

            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New module-->
<?php /**PATH D:\xampp\htdocs\abs\resources\views/menu/menu/modal/addMenuModal.blade.php ENDPATH**/ ?>