<tr>
    <td class="text-center">
        <?php echo e($loop->iteration); ?>

    </td>
    <td>
        <a href="#" target="_blank">
            <?php echo e($item->user->name ?? 'Admin'); ?><br>
            <?php echo e($item->user->email ?? '--'); ?>

        </a>
    </td>
    <td>
        <?php echo e($item->film->title); ?>

    </td>
    <td>
        <?php echo e($item->day); ?>

    </td>
    <td>
        <?php echo e($item->start); ?>

    </td>
    <td>
            <?php if(count($item->advertisement) > 0): ?>
                <?php $__currentLoopData = $item->advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($name->title); ?><br />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p>---</p>
            <?php endif; ?>


    </td>
    <td>
        <?php if(count($item->advertisement) > 0): ?>
            <?php $__currentLoopData = $item->advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e('http://'.$_SERVER['HTTP_HOST']."/storage/videos/".$file->file); ?>">Видео ролик <?php echo e($file->title); ?></a><br />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>---</p>
        <?php endif; ?>





    </td>
    <td>
        <?php echo e($item->tickets_price); ?>

    </td>
    <td>
        <?php echo e($item->film->duration + $item->duration_advertising + $item->duration_service); ?><br>
        <span class="text-primary" data-toggle="tooltip" title="Фильм"><?php echo e($item->film->duration); ?></span> +
        <span class="text-primary" data-toggle="tooltip" title="Реклама"><?php echo e($item->duration_advertising); ?></span> +
        <span class="text-primary" data-toggle="tooltip" title="Уборка"><?php echo e($item->duration_service); ?></span>
    </td>
    <td class="text-center">
        <span class="badge bg-<?php echo e($item->status->color); ?>"><?php echo e($item->status->title); ?></span>
    </td>
    <td class="text-center">
        <?php echo e($item->created_at ?? '--'); ?>

    </td>
    <td class="text-center">
        <a href="<?php echo e(route('admin.seances.edit',$item->id)); ?>" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/seances/_table.blade.php ENDPATH**/ ?>