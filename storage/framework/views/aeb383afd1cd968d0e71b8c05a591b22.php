<!-- resources/views/components/toolbar-component.blade.php -->

<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!-- Page Title -->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><?php echo e($title); ?></h1>

            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->

            <!-- Breadcrumb -->
            <?php if(!empty($breadcrumbs)): ?>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="breadcrumb-item <?php echo e($breadcrumb['active'] ?? false ? 'text-dark' : 'text-muted'); ?>">
                            <?php if(!empty($breadcrumb['url']) && empty($breadcrumb['active'])): ?>
                                <a href="<?php echo e($breadcrumb['url']); ?>" class="text-muted text-hover-primary">
                                    <?php echo e($breadcrumb['label']); ?>

                                </a>
                            <?php else: ?>
                                <span><?php echo e($breadcrumb['label']); ?></span>
                            <?php endif; ?>
                        </li>

                        <?php if(!$loop->last): ?>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Actions Button -->
        <?php if(!empty($actionUrl)): ?>
            <!-- Render as a link if actionUrl is provided -->
            <a href="<?php echo e($actionUrl); ?>" class="btn btn-sm btn-primary">
                <?php if(!empty($actionIcon)): ?>
                    <i class="<?php echo e($actionIcon); ?>"></i>
                <?php endif; ?>
                <?php echo e($actionLabel ?? 'Create'); ?></a>
        <?php elseif(!empty($modalTarget)): ?>
            <!-- Render as a button if modalTarget is provided -->
            <button type="button" class="btn btn-sm btn-primary" id="<?php echo e($modalTarget); ?>">
                <?php if(!empty($actionIcon)): ?>
                    <i class="<?php echo e($actionIcon); ?>"></i>
                <?php endif; ?>
                <?php echo e($actionLabel ?? 'Create'); ?>

            </button>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH D:\xampp\htdocs\abs\resources\views/components/toolbar-component.blade.php ENDPATH**/ ?>