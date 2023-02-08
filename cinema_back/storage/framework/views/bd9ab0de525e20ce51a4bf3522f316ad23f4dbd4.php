<div class="">
    <?php if(isset($label)): ?>
        <label for="<?php echo e($data); ?>">
            <?php echo e($label); ?>

            <?php if(isset($required)): ?> <span class="text-danger">*</span> <?php endif; ?>
        </label>
    <?php endif; ?>

    <input
        type="<?php echo e($type ?? 'text'); ?>"
        <?php if(isset($id)): ?> id="<?php echo e($id); ?>" <?php else: ?> id="<?php echo e($data); ?>" <?php endif; ?>
        <?php if(isset($name)): ?> name="<?php echo e($name); ?>" <?php else: ?> name="<?php echo e($data); ?>" <?php endif; ?>
        <?php if(isset($class)): ?> class="<?php echo e($class); ?>" <?php else: ?> class="form-control" <?php endif; ?>
        <?php if(isset($value)): ?> value="<?php echo e($value); ?>" <?php else: ?> value="<?php echo e($item->$data ?? old($data)); ?>" <?php endif; ?>
        <?php if(isset($pattern)): ?> pattern="<?php echo e($pattern); ?>" <?php else: ?> <?php if(isset($length)): ?> pattern="[\D\d\s]{2,<?php echo e($length); ?>}" <?php else: ?> pattern="[\D\d\s]{2,190}" <?php endif; ?> <?php endif; ?>
        <?php if(isset($length)): ?> length="<?php echo e($length); ?>" <?php endif; ?>
        <?php if(isset($max)): ?> max="<?php echo e($max); ?>" <?php endif; ?>
        <?php if(isset($min)): ?> min="<?php echo e($min); ?>" <?php endif; ?>

        <?php if(isset($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
        <?php if(isset($required)): ?> required <?php endif; ?>
        <?php if(isset($other)): ?> <?php echo e($other); ?> <?php endif; ?>
    >
</div>

<?php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
?>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_include/form/input.blade.php ENDPATH**/ ?>