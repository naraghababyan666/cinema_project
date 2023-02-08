<tr>
    <td class="text-center">
        <?php echo e($loop->iteration); ?>

    </td>
    <td>
        <a href="#" target="_blank">
            <?php echo e($item->user->name); ?><br>
            <?php echo e($item->user->email); ?>

        </a>
    </td>
    <td>
        <?php echo e($item->projector_name); ?>

    </td>
    <td>
        <?php echo e($item->projector_number); ?>

    </td>
    <td class="text-center">
        <?php echo e($item->created_at ?? '--'); ?>

    </td>
    <td class="text-center">



    </td>
</tr>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/projectors/_table.blade.php ENDPATH**/ ?>