<?php if($errors->any() or session('success') or session('primary') or session('error')): ?>
    <?php
        if(session('success'))
        {
            $color = 'success';
        }
        elseif(session('primary'))
        {
            $color = 'primary';
        }
        elseif($errors->any() or session('error'))
        {
            $color = 'danger';
        }
    ?>



                <div class="alert alert-default-<?php echo e($color); ?> w-75 my-0" >
                    <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <?php if(session('success')): ?>
                        <?php echo session()->get('success'); ?>

                    <?php elseif(session('primary')): ?>
                        <?php echo session()->get('primary'); ?>

                    <?php elseif(session('error')): ?>
                        <?php echo session()->get('error'); ?>

                    <?php elseif($errors->any()): ?>
                        <?php $__empty_1 = true; $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php echo e($error); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo session()->get('error'); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </div>



<?php endif; ?>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_include/_messages.blade.php ENDPATH**/ ?>