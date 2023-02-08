<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2" style="width: fit-content;">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <?php if($errors->any()): ?>
                        <h4><?php echo e($errors->first()); ?></h4>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/index.blade.php ENDPATH**/ ?>