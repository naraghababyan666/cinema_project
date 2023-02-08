<div class="imgUp">
    <p class="font-weight-bold">Изображение <span class="text-danger" data-tooltip="tooltip" title="Обязательное поле">*</span></p>
    <div class="imagePreview" style="background-image: url(<?php if(isset($item)): ?> <?php echo e($item->getImage()); ?> <?php else: ?> /admin/img/no-logo.png <?php endif; ?>)"></div>
    <label class="btn btn-primary">
        <?php if(isset($item)): ?> Изменить <?php else: ?> Добавить <?php endif; ?>
        <input type="file" name="image" class="uploadFile img" 
        value="<?php if(isset($item)): ?><?php echo e($item->image); ?><?php else: ?> Добавить фото <?php endif; ?>" 
        style="width: 0px;height: 0px;overflow: hidden;" 
        accept=".jpg,.jpeg,.tiff,.bmp,.tif,.png,.raw"
        <?php if(empty($item)): ?> required <?php endif; ?>>
    </label>
</div>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_include/form/image.blade.php ENDPATH**/ ?>