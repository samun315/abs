<?php $__env->startSection('title', 'Role Permission List'); ?>
<?php $__env->startSection('content'); ?>

    <!--begin::Toolbar -->
    <?php if (isset($component)) { $__componentOriginal518dae97e09a2170c801e9ed31398b56 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal518dae97e09a2170c801e9ed31398b56 = $attributes; } ?>
<?php $component = App\View\Components\ToolbarComponent::resolve(['title' => 'Role Permission List','breadcrumbs' => [
        ['label' => 'Home', 'url' => route('dashboard')],
        ['label' => 'Menu Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Menu Master', 'url' => 'javascript:void(0)'],
        ['label' => 'Role Permission List', 'active' => true],
    ],'actionUrl' => ''.e(route('menu.master.rolePermission.create')).'','actionIcon' => 'fas fa-plus-circle','actionLabel' => 'Add new'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal9b33c063a2222f59546ad2a2a9a94bc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9b33c063a2222f59546ad2a2a9a94bc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9b33c063a2222f59546ad2a2a9a94bc6)): ?>
<?php $attributes = $__attributesOriginal9b33c063a2222f59546ad2a2a9a94bc6; ?>
<?php unset($__attributesOriginal9b33c063a2222f59546ad2a2a9a94bc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9b33c063a2222f59546ad2a2a9a94bc6)): ?>
<?php $component = $__componentOriginal9b33c063a2222f59546ad2a2a9a94bc6; ?>
<?php unset($__componentOriginal9b33c063a2222f59546ad2a2a9a94bc6); ?>
<?php endif; ?>

                    
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body py-4">
                    <?php echo $__env->make('message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="data-table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted text-uppercase fw-bolder fs-7 gs-0">
                                    <th>#</th>
                                    <th>User Role Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                        </table>
                    </div>
                    <!--end::Table-->
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
        function openModal() {
            $('#formModal').modal('show')
        }

        let search = $('#search');

        // fetch the data
        let table = $("#data-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: window.location.href,
                data: function(d) {
                    d.search = search.val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "user_role.role_name",
                    name: "user_role.role_name",
                },
                {
                    data: "permissions_count",
                    name: "permissions_count",
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });
        search.keyup(function() {
            table.draw();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\abs\resources\views/menu/master/rolePermission/index.blade.php ENDPATH**/ ?>