<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($menuItem->type == 'divider'): ?>
        <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1"><?php echo e($menuItem?->menu_item_name); ?></span>
            </div>
        </div>
    <?php else: ?>
        <?php if(empty($menuItem?->parent_id) && !empty($menuItem?->url) && $menuItem?->type === 'menu_item'): ?>
            <div class="menu-item">
                <a class="menu-link" href="<?php echo e($menuItem?->url); ?>" target="<?php echo e($menuItem?->target); ?>">
                    <span class="menu-icon">
                        <i class="<?php echo e($menuItem?->icon_class); ?> fs-3"></i>
                    </span>
                    <span class="menu-title"><?php echo e($menuItem?->menu_item_name); ?></span>
                </a>
            </div>
        <?php else: ?>
            <?php if(empty($menuItem?->parent_id) && empty($menuItem?->url) && $menuItem?->type === 'menu_item'): ?>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="<?php echo e($menuItem?->icon_class); ?> fs-3"></i>
                        </span>
                        <span class="menu-title"><?php echo e($menuItem?->menu_item_name); ?></span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <?php if($menuItem && $menuItem->children->isNotEmpty()): ?>
                            <?php $__currentLoopData = $menuItem?->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if($menuItem->menu_item_id === $childData?->parent_id && $menuItem->type === 'menu_item'): ?>
                                    
                                    <?php if($childData?->type === 'menu_item' && !empty($childData?->parent_id)): ?>
                                        <?php if(!empty($childData?->url)): ?>
                                            <div class="menu-item">
                                                <a class="menu-link" href="<?php echo e($childData?->url); ?>" target="<?php echo e($childData?->target); ?>">
                                                    <span class="menu-bullet">
                                                        <span class="<?php echo e($childData?->icon_class); ?>"></span>
                                                    </span>
                                                    <span class="menu-title"><?php echo e($childData?->menu_item_name); ?></span>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            
                                            <div data-kt-menu-trigger="click"
                                                class="menu-item menu-accordion menu-active-bg">
                                                <span class="menu-link">
                                                    <span class="menu-bullet">
                                                        <span class="<?php echo e($childData?->icon_class); ?> fs-3"></span>
                                                    </span>
                                                    <span class="menu-title"><?php echo e($childData?->menu_item_name); ?></span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                                <div class="menu-sub menu-sub-accordion">
                                                    <?php if($childData && $childData->children->isNotEmpty()): ?>
                                                        <?php $__currentLoopData = $childData->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            <?php if($childData->menu_item_id === $grandChildData?->parent_id && $grandChildData?->type === 'menu_item'): ?>
                                                                <div class="menu-item">
                                                                    <a class="menu-link"
                                                                        href="<?php echo e($grandChildData?->url); ?>" target="<?php echo e($grandChildData?->target); ?>">
                                                                        <span class="menu-icon">
                                                                            <i
                                                                                class="<?php echo e($grandChildData?->icon_class); ?> fs-3"></i>
                                                                        </span>
                                                                        <span
                                                                            class="menu-title"><?php echo e($grandChildData?->menu_item_name); ?></span>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    </div>
                </div>
            <?php else: ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\xampp\htdocs\abs\resources\views/components/backend-sidebar.blade.php ENDPATH**/ ?>