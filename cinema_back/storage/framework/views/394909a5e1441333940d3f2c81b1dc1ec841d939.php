<tr>
    <td class="text-center">
        <?php echo e($loop->iteration); ?>

    </td>

    <td>
        <?php echo e($item->name ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->email ?? '--'); ?>

    </td>
    <td>
        <?php echo e($item->role->title); ?>

    </td>
    <td>
        <?php echo e($item->percent); ?> %
    </td>
        
        
        
        
        
        
        
    <td>
        <?php echo e($item->country_code); ?>

    </td>
    <td>
        <?php echo e($item->phone); ?>

    </td>
    <td class="text-center">
        <?php echo e($item->created_at ?? '--'); ?>

    </td>
    <td class="text-center">
        <a href="<?php echo e(route('admin.users.edit',$item->id)); ?>" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/users/_table.blade.php ENDPATH**/ ?>