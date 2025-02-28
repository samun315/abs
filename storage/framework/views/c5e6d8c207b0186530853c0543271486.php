<div class="row">
    <div class="col-md-12">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
            <div class="alert alert-danger">
                <strong>Error! </strong> <?php echo e(session()->get('error')); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\abs\resources\views/message.blade.php ENDPATH**/ ?>