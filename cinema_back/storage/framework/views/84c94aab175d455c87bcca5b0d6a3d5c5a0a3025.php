

<?php $__env->startSection('content'); ?>
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row" id="editor">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="<?php if(isset($item)): ?><?php echo e(route('admin.films.update',['id'=>$item->id])); ?><?php else: ?><?php echo e(route('admin.films.store')); ?><?php endif; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                        <?php if(isset($item)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
                        <?php echo csrf_field(); ?>

                        <div class="card-header">
                            <a href="<?php echo e(route('admin.films.index')); ?>" class="text-primary mr-2">
                                <i class="fas fa-angle-double-left"></i>
                            </a>

                            <span class="font-weight-bold"><?php if(isset($item)): ?>Редактирование <?php else: ?> Создание <?php endif; ?> фильма</span>

                            <div class="card-tools">
                                <?php echo $__env->make('admin._include._card_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            
                            
                            
                            

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['data'=>'title','label'=>'Название','placeholder'=>'Введите данные','length'=>150,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Жанры</label>
                                        <select name="genres_id[]" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="genres_id" tabindex="-1" aria-hidden="true" data-placeholder=" Сделайте выбор" multiple required>
                                            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($genre->id); ?>" <?php if(is_array(old('genres_id')) && in_array($genre->id, old('genres_id'))): ?> selected
                                                <?php elseif(isset($item) && ($item->genre_id == $genre->id)): ?> selected
                                                <?php endif; ?>
                                                ><?php echo e($genre->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Формат</label>
                                        <select name="format_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                            <?php if(!old('format_id') || !(isset($item))): ?>
                                            <option value="" selected disabled>Сделайте выбор</option>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $formats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $format): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($format->id); ?>" <?php if(old('format_id')): ?> selected <?php elseif(isset($item) && $item->format_id == $format->id): ?> selected
                                                <?php endif; ?>
                                                ><?php echo e($format->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['data'=>'duration','type'=>'number','label'=>'Длительность, мин.','placeholder'=>'Введите данные','length'=>3,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['data'=>'rating','type'=>'text','label'=>'Рейтинг','placeholder'=>'Введите рейтинг','value' => $item->rating, 'max' => 10,'length'=>5,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Прокат</label>
                                        <select name="rent_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                            <?php if(!old('rent_id') || !(isset($item))): ?>
                                                <option value="" selected disabled>Сделайте выбор</option>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $rents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($rent->rent); ?>" <?php if(old('rent_id')): ?> selected <?php elseif(isset($item) && $item->rent_id == $rent->id): ?> selected
                                                <?php endif; ?>
                                                ><?php echo e($rent->rent_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                        <?php echo $__env->make('admin._include.form.input',['data'=>'file','label'=>'Расположение','placeholder'=>'Введите данные','length'=>150,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <?php echo $__env->make('admin._include.form.textarea',['data'=>'description','label'=>'Описание','placeholder'=>'Введите данные','length'=>1500,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <?php echo $__env->make('admin._include.form.image',['data'=>'image','label'=>'Изображение','required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md mb-3">
                                    <?php echo $__env->make('admin._include.form.video',['data'=>'file','label'=>'Видео файл','required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <input type="checkbox" name="is_active" data-bootstrap-switch data-off-color="danger" data-on-color="success" <?php if(!isset($item) or $item->is_active == true): ?> checked <?php endif; ?> >
                            <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            <label for="delete" class="btn btn-danger ml-4">Удалить</label>
                        </div>
                    </form>
                    <form action="<?php echo e(route('admin.films.destroy', [ 'id'=> $item->id ])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" style="display: none;" id="delete"></button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>






<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/films/credit.blade.php ENDPATH**/ ?>