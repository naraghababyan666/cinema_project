<div class="form-group">
    <label for="<?php echo e($data); ?>">
        <?php if(isset($lang) and $lang != false): ?> <img src="/admin/img/flag-<?php echo e($lang); ?>.png" width="18px" alt="">  <?php endif; ?>
        <?php echo $label; ?>

        <?php if(isset($required)): ?><span class="text-danger" data-tooltip="tooltip" title="Обязательное поле">*</span><?php endif; ?>
    </label>
    <textarea class="form-control" name="<?php echo e($data); ?>" length="<?php echo e($length); ?>" id="<?php echo e($data); ?>" <?php if(isset($required)): ?> required <?php endif; ?>><?php if(old($data)): ?> <?php echo e(trim(old($data))); ?><?php elseif(isset($item)): ?> <?php echo e(trim($item->$data)); ?><?php endif; ?></textarea>
</div>

<?php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
?>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_include/form/textarea.blade.php ENDPATH**/ ?>