<tr>
    <td class="text-center">
        <?php echo e($loop->iteration); ?>

    </td>

    <td>
        <?php echo e($item->id); ?>

    </td>
    <td>
        <?php echo e($item->user->name ?? '--'); ?> <br/>
        <?php echo e($item->user->email ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->name_theatre); ?>

    </td>
    <td>
        <?php echo e($item->name_hall); ?>

    </td>
    <td>
        <?php echo e($item->region ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->city ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->house ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->hall_rows ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->hall_seats ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->voice_hardware ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->screen_width ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->screen_length ?? '--'); ?>

    </td>










</tr>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/halls/_table.blade.php ENDPATH**/ ?>