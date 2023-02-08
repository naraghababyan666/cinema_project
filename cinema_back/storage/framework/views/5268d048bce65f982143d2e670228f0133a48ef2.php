

<?php $__env->startSection('content'); ?>
    <p>&nbsp;</p>
    <h4><?php echo e($user->name); ?>!</h4>
    <h4>Ваш код для входа в систему  <h2><?php echo e($code); ?></h2></h4>
    <h4>Активен в течение 3 минут.</h4>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('emails._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/emails/LoginCode.blade.php ENDPATH**/ ?>