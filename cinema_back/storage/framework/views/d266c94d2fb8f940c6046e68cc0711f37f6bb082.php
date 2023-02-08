<tr>
    <td class="text-center">
        <?php echo e($loop->iteration); ?>

    </td>
    <td>

            <?php echo e($item->rent->rent_title); ?>


    </td>
    <td>
        <?php echo e($item->title); ?>

    </td>
    <td>
        <?php echo e(implode(', ',$item->genres->pluck('title')->all())); ?>

    </td>
    <td>
        <?php echo e($item->format->title); ?>

    </td>

    <td class="text-center">
        <?php if($item->is_active == true): ?>
        <span class="badge bg-success">активен</span>
        <?php else: ?>
        <span class="badge bg-danger">заблокирован</span>
        <?php endif; ?>
    </td>
    <td>
        <?php echo e($item->rating); ?>

    </td>
    <td class="text-center">
        <?php echo e($item->created_at ?? '--'); ?>

    </td>
    <td class="text-center">
        <a href="<?php echo e(route('admin.films.edit',$item->id)); ?>" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
        <!-- <form action="<?php echo e(route('admin.films.destroy',$item->id)); ?>" method="post" target="myFrame" id="myForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input type="submit" value="del"></input>
        </form> -->

    </td>
</tr>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/films/_table.blade.php ENDPATH**/ ?>