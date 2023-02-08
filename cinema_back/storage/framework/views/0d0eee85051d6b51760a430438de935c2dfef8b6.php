<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('admin._layout.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <title>ExtraCinema</title>
    <?php echo $__env->make('admin._layout.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>

</head>
<body class="hold-transition">
    <div class="wrapper">
        <?php echo $__env->make('admin._layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin._layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('admin._layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('admin._layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout.blade.php ENDPATH**/ ?>