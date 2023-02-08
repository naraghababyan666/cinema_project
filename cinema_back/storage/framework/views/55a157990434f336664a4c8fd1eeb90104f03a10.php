<?php $id = isset($item) ? $item->id : null; ?>
<div class="modal fade" id="modal<?php echo e($id); ?>delete" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo e($id); ?>deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="<?php if(isset($item)): ?><?php echo e(route('admin.genres.destroy',['id'=>$item->id])); ?><?php endif; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                <?php if(isset($item)): ?> <?php echo method_field('DELETE'); ?> <?php endif; ?>
                <?php echo csrf_field(); ?>

                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="modal<?php echo e($id); ?>deleteLabel">Точно удалить?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-danger ml-4">Удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/genres/_delete_modal.blade.php ENDPATH**/ ?>