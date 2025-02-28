<?php $__env->startSection('title', 'Role Permission Create'); ?>
<?php $__env->startSection('content'); ?>

    <!--begin::Toolbar -->
    <?php if (isset($component)) { $__componentOriginal518dae97e09a2170c801e9ed31398b56 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal518dae97e09a2170c801e9ed31398b56 = $attributes; } ?>
<?php $component = App\View\Components\ToolbarComponent::resolve(['title' => 'Role Permission Create','breadcrumbs' => [
        ['label' => 'Home', 'url' => route('dashboard')],
        ['label' => 'Menu Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Menu Master', 'url' => 'javascript:void(0)'],
        ['label' => 'Role Permission Create', 'active' => true],
    ],'actionUrl' => ''.e(route('menu.master.rolePermission.index')).'','actionIcon' => 'fas fa-table','actionLabel' => 'Role Permission List'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1"> Add New </span>
                    </h3>
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body py-3">
                    <?php echo $__env->make('message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!--begin::Form-->
                    <form class="form" method="POST" action="<?php echo e(route('menu.master.rolePermission.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-5">
                            <div class="col-md-12 fv-row mb-5">
                                <label class="required fs-5 fw-bold mb-2">User Role Name</label>
                                <select name="role_id"
                                    class="form-select form-select-solid <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    data-control="select2" data-placeholder="Select User Role Name">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($userRole->role_id); ?>"><?php echo e($userRole->role_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['role_id'];
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
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row row mb-5">
                                <label class="required fs-5 fw-bold mb-5">Permission</label>
                                <div class="col-md-12 form-check ms-3">
                                    <input class="form-check-input toggleSelectAll" type="checkbox" id="selectAllCheckbox"
                                        name="">
                                    Select All

                                    <div class="m-7 border">
                                    </div>
                                </div>
                                <?php $__currentLoopData = $itemNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 mb-5">
                                        <h4 class="mb-4">Module Item: <?php echo e($itemName?->item_name); ?></h4>

                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($itemName?->item_id == $permission?->item_id): ?>
                                                <div class="form-check mb-4 ms-2">
                                                    <input
                                                        class="form-check-input checkboxes updateSelectAll <?php $__errorArgs = ['menu_permission_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        type="checkbox" name="menu_permission_id[]"
                                                        value="<?php echo e($permission->menu_permission_id); ?>" />
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <?php echo e($permission->name); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php $__errorArgs = ['menu_permission_id'];
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
                        <div class="modal-footer flex-center">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_script'); ?>
    <script nonce="<?php echo e($cspNonce); ?>">
        $(document).on("click", ".toggleSelectAll", function() {
            toggleSelectAll();
        });

        function toggleSelectAll() {
            const selectAllCheckbox = document.getElementById('selectAllCheckbox');
            const checkboxes = document.querySelectorAll('.checkboxes');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }

        $(document).on("click", ".updateSelectAll", function() {
            updateSelectAll();
        });

        function updateSelectAll() {
            const selectAllCheckbox = document.getElementById('selectAllCheckbox');
            const checkboxes = document.querySelectorAll('.checkboxes');
            selectAllCheckbox.checked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\abs\resources\views/menu/master/rolePermission/create.blade.php ENDPATH**/ ?>