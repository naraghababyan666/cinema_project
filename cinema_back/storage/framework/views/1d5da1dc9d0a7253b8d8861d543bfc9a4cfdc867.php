<tr>
    <td class="text-center">
        <?php echo e($item->id); ?>

    </td>
    <td>
        <a href="#" target="_blank">
            <?php echo e($item->user->name); ?><br>
            <?php echo e($item->user->email); ?>

        </a>
    </td>
    <td>
        <?php echo e($item->form_type); ?>

    </td>
    <td>
        <?php echo e($item->name); ?>

    </td>
    <td>
        <?php echo e($item->passport); ?>

    </td>
    <td>
        <?php echo e($item->created_at); ?>

    </td>
    <td class="text-center">
        <?php if($item->verified == 1): ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
            </svg>
        <?php else: ?>
            <form action="<?php echo e(route('admin.documents_for_holders.change', ['id' => $item->id, 'user_id' => $item->user->id])); ?>" method="POST">

                <?php echo csrf_field(); ?>
                <button type='submit' class="text-primary mx-2" style="border: none; background: transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>
            </form>
        <?php endif; ?>
    </td>
</tr>

<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/documents_for_holders/_table.blade.php ENDPATH**/ ?>