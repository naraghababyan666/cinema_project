

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <form action="<?php echo e(route('admin.advertisement.store')); ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                            <?php if(isset($item)): ?> <?php echo method_field('PATCH'); ?> <?php endif; ?>
                            <?php echo csrf_field(); ?>

                            <div class="card-header">
                                <a href="<?php echo e(route('admin.advertisement.index')); ?>" class="text-primary mr-2">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>

                                <span class="font-weight-bold"><?php if(isset($item)): ?>Редактирование <?php else: ?> Создание <?php endif; ?> реклам</span>

                                <div class="card-tools">
                                    <?php echo $__env->make('admin._include._card_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <?php echo $__env->make('admin._include.form.input',['data'=>'title','type'=>'text','label'=>'Название реклама','placeholder'=>'Введите данные','length'=>30,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <?php echo $__env->make('admin._include.form.input',['data'=>'duration','type'=>'number','label'=>'Длительность(сек)','placeholder'=>'Введите данные','length'=>3,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <?php echo $__env->make('admin._include.form.video',['data'=>'file','type'=>'number','label'=>'Видео','placeholder'=>'Введите данные','length'=>10,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end">

                                <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>






<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/advertisement/create.blade.php ENDPATH**/ ?>