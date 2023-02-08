<?php $id = isset($item) ? $item->id : null; ?>
<div class="modal fade" id="modal<?php echo e($id); ?>show" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo e($id); ?>showLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php if(isset($item)): ?><?php echo e(route('admin.genres.update',['id'=>$item->id])); ?><?php else: ?><?php echo e(route('admin.genres.store')); ?><?php endif; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                <?php if(isset($item)): ?> <?php echo method_field('PATCH'); ?> <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="modal<?php echo e($id); ?>showLabel"><?php if(isset($data)): ?>Редактирование <?php else: ?> Создание <?php endif; ?> жанра</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <?php echo $__env->make('admin._include.form.input',['data'=>'title','label'=>'Название','placeholder'=>'Введите данные','length'=>150,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/genres/_credit_modal.blade.php ENDPATH**/ ?>