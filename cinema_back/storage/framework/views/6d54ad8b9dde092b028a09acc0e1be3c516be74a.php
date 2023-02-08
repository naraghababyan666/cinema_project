

<?php $__env->startSection('content'); ?>
<p>&nbsp;</p>
<p><?php echo e($user->name); ?>!</p>
<p>Вас зарегистрировали на сайте
<h3>
    <a href="<?php echo e(env('APP_URL')); ?>"><?php echo e(env('APP_NAME')); ?></a>
</h3>
</p>
<p>Логин: <?php echo e($user->email); ?></p>
<p>Пароль: <?php echo e($user->open_password); ?></p>
<p>&nbsp;</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/emails/NewUser.blade.php ENDPATH**/ ?>