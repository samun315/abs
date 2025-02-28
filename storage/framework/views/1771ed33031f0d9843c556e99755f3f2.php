<?php $__env->startSection('title', 'Menu Item List'); ?>
<?php $__env->startSection('breadcrumbMainTitle', 'Menu Item List'); ?>
<?php $__env->startSection('page_css'); ?>
    <!-- Menu item custom css -->
    <link href="<?php echo e(asset('assets/custom/css/menu/menuItem/style.css')); ?>"
        <?php echo e(Sri::html('assets/custom/css/menu/menuItem/style.css')); ?> rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal518dae97e09a2170c801e9ed31398b56 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal518dae97e09a2170c801e9ed31398b56 = $attributes; } ?>
<?php $component = App\View\Components\ToolbarComponent::resolve(['title' => 'Menu Item List','breadcrumbs' => [
        ['label' => 'Home', 'url' => route('dashboard')],
        ['label' => 'Menu Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Menu Master', 'url' => 'javascript:void(0)'],
        ['label' => 'Menu', 'url' => route('menu.menu.index')],
        ['label' => 'Builder', 'url' => route('menu.menu.index')],
        ['label' => 'Menu Item List', 'active' => true],
    ],'modalTarget' => 'openMenuItemModal','actionIcon' => 'fas fa-plus-circle','actionLabel' => 'Add New'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                <?php echo $__env->make('menu.menuItem.modal.addMenuItemModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--begin::Card body-->
                <div class="card-body row">

                    <div class="cf mt-5">

                        <div class="dd" id="nestable">
                            <ol class="dd-list">
                                <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($menuItem->type == 'divider'): ?>
                                        <li class="dd-item" data-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                            <div class="dd-handle">Divider: <?php echo e($menuItem?->menu_item_name); ?></div>
                                            <div class="item_actions">
                                                <button class="btn btn-info btn-sm editMenuItem" data-bs-toggle="modal"
                                                    data-bs-target="#showModal"
                                                    data-edit-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm deleteMenuItem"
                                                    data-delete-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </li>
                                    <?php else: ?>
                                        <?php if(empty($menuItem?->parent_id) && !empty($menuItem?->url) && $menuItem?->type === 'menu_item'): ?>
                                            <li class="dd-item" data-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                <div class="dd-handle">Menu: <?php echo e($menuItem?->menu_item_name); ?></div>
                                                <div class="item_actions">
                                                    <button class="btn btn-info btn-sm editMenuItem" data-bs-toggle="modal"
                                                        data-bs-target="#showModal"
                                                        data-edit-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm deleteMenuItem"
                                                        data-delete-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </li>
                                        <?php else: ?>
                                            <?php if(empty($menuItem?->parent_id) && empty($menuItem?->url) && $menuItem?->type === 'menu_item'): ?>
                                                <li class="dd-item" data-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                    <div class="dd-handle">Parent: <?php echo e($menuItem?->menu_item_name); ?></div>
                                                    <div class="item_actions">
                                                        <button class="btn btn-info btn-sm editMenuItem"
                                                            data-bs-toggle="modal" data-bs-target="#showModal"
                                                            data-edit-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm deleteMenuItem"
                                                            data-delete-id="<?php echo e($menuItem?->menu_item_id); ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <ol class="dd-list">
                                                        <?php $__currentLoopData = $childDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($menuItem?->menu_item_id == $childData?->parent_id && $menuItem?->type === 'menu_item'): ?>
                                                                <?php if(!empty($childData?->parent_id) && !empty($childData?->url) && $childData?->type === 'menu_item'): ?>
                                                                    <li class="dd-item"
                                                                        data-id="<?php echo e($childData?->menu_item_id); ?>">
                                                                        <div class="dd-handle">Child:
                                                                            <?php echo e($childData?->menu_item_name); ?></div>
                                                                        <div class="item_actions">
                                                                            <button class="btn btn-info btn-sm editMenuItem"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#showModal"
                                                                                data-edit-id="<?php echo e($childData?->menu_item_id); ?>">
                                                                                <i class="fas fa-edit"></i>
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm deleteMenuItem"
                                                                                data-delete-id="<?php echo e($childData?->menu_item_id); ?>">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <?php if(!empty($childData?->parent_id) && empty($childData?->url) && $childData?->type === 'menu_item'): ?>
                                                                        <li class="dd-item"
                                                                            data-id="<?php echo e($childData?->menu_item_id); ?>">
                                                                            <div class="dd-handle">Child:
                                                                                <?php echo e($childData?->menu_item_name); ?></div>
                                                                            <div class="item_actions">
                                                                                <button
                                                                                    class="btn btn-info btn-sm editMenuItem"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#showModal"
                                                                                    data-edit-id="<?php echo e($childData?->menu_item_id); ?>">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm deleteMenuItem"
                                                                                    data-delete-id="<?php echo e($childData?->menu_item_id); ?>">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </div>
                                                                            <ol class="dd-list">
                                                                                <?php $__currentLoopData = $grandChildDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if($childData?->menu_item_id == $grandChildData?->parent_id && $childData?->type === 'menu_item'): ?>
                                                                                        <li class="dd-item"
                                                                                            data-id="<?php echo e($grandChildData?->menu_item_id); ?>">
                                                                                            <div class="dd-handle">Grand
                                                                                                Child:
                                                                                                <?php echo e($grandChildData?->menu_item_name); ?>

                                                                                            </div>
                                                                                            <div class="item_actions">
                                                                                                <button
                                                                                                    class="btn btn-info btn-sm editMenuItem"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#showModal"
                                                                                                    data-edit-id="<?php echo e($grandChildData?->menu_item_id); ?>">
                                                                                                    <i
                                                                                                        class="fas fa-edit"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn btn-danger btn-sm deleteMenuItem"
                                                                                                    data-delete-id="<?php echo e($grandChildData?->menu_item_id); ?>">
                                                                                                    <i
                                                                                                        class="fas fa-trash"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </li>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </ol>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ol>
                                                </li>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                        </div>
                    </div>
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
    <script src="<?php echo e(asset('assets/custom/js/menu/menuItem/index.js')); ?>"
        <?php echo e(Sri::html('assets/custom/js/menu/menuItem/index.js')); ?>></script>
    <!--end::Page Custom Stylesheets(used by this page)-->
    <script nonce="<?php echo e($cspNonce); ?>">
        $(document).ready(function() {

            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            // activate Nestable for list 1
            $('#nestable').nestable({
                    group: 1
                })
                .on('change', updateOutput);

            // activate Nestable for list 2
            $('#nestable2').nestable({
                    group: 1
                })
                .on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            updateOutput($('#nestable2').data('output', $('#nestable2-output')));

            $('#nestable-menu').on('click', function(e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#nestable3').nestable();

        });

        $('.dd').nestable({
            maxDepth: 3
        });

        $('.dd').on('change', function(e) {
            console.log(JSON.stringify($('.dd').nestable('serialize')));

            $.ajax({
                type: "DELETE",
                url: '<?php echo e(route('menu.menu.menuItem.order', $menuInfos?->menu_id)); ?>',
                dataType: "JSON",
                type: "POST",
                data: {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response?.statusCode === 200) {
                        toastr.success(response?.message, "Success!");
                    } else {
                        toastr.error(
                            "Could not delete parent, need to delete child first.'!"
                        );
                    }
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\abs\resources\views/menu/menuItem/index.blade.php ENDPATH**/ ?>