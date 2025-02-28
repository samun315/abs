<!--begin::Javascript-->
<script nonce="<?php echo e($cspNonce); ?>">
    var hostUrl = "assets/";
</script>

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"
    <?php echo e(Sri::html('assets/plugins/global/plugins.bundle.js')); ?>></script>
<script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>" <?php echo e(Sri::html('assets/js/scripts.bundle.js')); ?>></script>
<!--end::Global Javascript Bundle-->

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"
    <?php echo e(Sri::html('assets/plugins/custom/datatables/datatables.bundle.js')); ?>></script>
<!--end::Page Vendors Javascript-->

<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?php echo e(asset('assets/js/widgets.bundle.js')); ?>" <?php echo e(Sri::html('assets/js/widgets.bundle.js')); ?>></script>
<script src="<?php echo e(asset('assets/js/custom/widgets.js')); ?>" <?php echo e(Sri::html('assets/js/custom/widgets.js')); ?>></script>
<script src="<?php echo e(asset('assets/js/custom/apps/chat/chat.js')); ?>" <?php echo e(Sri::html('assets/js/custom/apps/chat/chat.js')); ?>>
</script>
<script src="<?php echo e(asset('assets/js/custom/utilities/modals/upgrade-plan.js')); ?>"
    <?php echo e(Sri::html('assets/js/custom/utilities/modals/upgrade-plan.js')); ?>></script>
<script src="<?php echo e(asset('assets/js/custom/utilities/modals/create-app.js')); ?>"
    <?php echo e(Sri::html('assets/js/custom/utilities/modals/create-app.js')); ?>></script>
<script src="<?php echo e(asset('assets/js/custom/utilities/modals/users-search.js')); ?>"
    <?php echo e(Sri::html('assets/js/custom/utilities/modals/users-search.js')); ?>></script>
<!--end::Page Custom Javascript-->

<!-- DataTable js -->
<script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"
    <?php echo e(Sri::html('assets/plugins/custom/datatables/datatables.bundle.js')); ?>></script>
<!-- <script src="<?php echo e(asset('assets/js/pages/crud/datatables/extensions/buttons.js')); ?>"></script> -->

<!-- Wait Me js -->
<script src="<?php echo e(asset('assets/plugins/global/waitMe/waitMe.min.js')); ?>"
    <?php echo e(Sri::html('assets/plugins/global/waitMe/waitMe.min.js')); ?>></script>

<script nonce="<?php echo e($cspNonce); ?>">
    $(".alert-success").delay(2000).fadeOut("slow");
    //   $(".alert-danger").delay(2000).fadeOut("slow");
</script>

<!-- Custom Common js -->
<script src="<?php echo e(asset('assets/custom/js/common/common.js')); ?>" <?php echo e(Sri::html('assets/custom/js/common/common.js')); ?>>
</script>

<!-- Jquery Validate js -->
<script src="<?php echo e(asset('assets/plugins/global/jqueryValidate/jquery.validate.min.js')); ?>"
    <?php echo e(Sri::html('assets/plugins/global/jqueryValidate/jquery.validate.min.js')); ?>></script>

<!-- Jquery Validate js -->
<script src="<?php echo e(asset('assets/plugins/custom/draggable/jquery-nestable.js')); ?>"
    <?php echo e(Sri::html('assets/plugins/custom/draggable/jquery-nestable.js')); ?>></script>

<script nonce="<?php echo e($cspNonce); ?>">
    $(".menu .menu-item a").each(function () {
        var pageUrl = window.location.href.split(/[?#]/)[0];

        if (this.href == pageUrl) {
            $(this).addClass("active");
            $(this).parent().parent().parent().addClass("here show"); // parent class add
            $(this).parent().parent().parent().parent().parent().addClass("here show"); // parent class add
        }
    });
</script>

<!-- IziToast Js-->
<script src="<?php echo e(asset('js/iziToast.js')); ?>"></script>

<?php echo $__env->yieldContent('page_script'); ?>
<?php /**PATH D:\xampp\htdocs\abs\resources\views/layout/script.blade.php ENDPATH**/ ?>