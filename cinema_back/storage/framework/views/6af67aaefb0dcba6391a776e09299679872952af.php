<label>
    <?php echo e($label); ?> <?php if(isset($required)): ?> <span class="text-danger">*</span> <?php endif; ?> <?php if(isset($item->file) and $item->file != null): ?> <a href="<?php echo e($item->getFile()); ?>" class="text-primary" target="_blank"><i class="far fa-share-square"></i></a> <?php endif; ?>
</label>
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="<?php echo e($data); ?>" id="<?php echo e($data); ?>" aria-describedby="<?php echo e($data); ?>" accept=".mp4,.avi" <?php if(isset($required)): ?> <?php if(empty($item->$data)): ?> required <?php endif; ?> <?php endif; ?>>
        <label class="custom-file-label" for="<?php echo e($data); ?>"><?php if(isset($item->$data)): ?> <?php echo e($item->$data); ?> <?php else: ?> Выберите файл <?php endif; ?></label>
    </div>
</div><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_include/form/video.blade.php ENDPATH**/ ?>