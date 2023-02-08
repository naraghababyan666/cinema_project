<tr>
    <td class="text-center">
        <?php echo e($loop->iteration); ?>

    </td>

    <td>
        <?php echo e($item->title ?? '--'); ?>

    </td>
    <td class="text-center">
        <a class="text-primary mx-2" data-toggle="modal" data-target="#modal<?php echo e($item->id); ?>show">
            <i class="far fa-edit"></i>
        </a>
        <?php echo $__env->make('admin.genres._credit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a class="text-danger" data-toggle="modal" data-target="#modal<?php echo e($item->id); ?>delete">
            <i class="far fa-trash-alt"></i>
        </a>
        <?php echo $__env->make('admin.genres._delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </td>
</tr>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/genres/_table.blade.php ENDPATH**/ ?>