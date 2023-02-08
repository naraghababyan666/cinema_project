<?php $__env->startSection('content'); ?>
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row" id="editor">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="<?php if(isset($item)): ?><?php echo e(route('admin.seances.update',['id'=>$item->id])); ?><?php else: ?><?php echo e(route('admin.seances.store')); ?><?php endif; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                        <?php if(isset($item)): ?> <?php echo method_field('PATCH'); ?> <?php endif; ?>
                        <?php echo csrf_field(); ?>

                        <div class="card-header">
                            <a href="<?php echo e(route('admin.seances.index')); ?>" class="text-primary mr-2">
                                <i class="fas fa-angle-double-left"></i>
                            </a>

                            <span class="font-weight-bold"><?php if(isset($item)): ?>Редактирование <?php else: ?> Создание <?php endif; ?> сеанса</span>

                            <div class="card-tools">
                                <?php echo $__env->make('admin._include._card_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Фильм</label>
                                        <select name="film_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                            <option value="" selected disabled>Сделайте выбор</option>
                                            <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($film->id); ?>" <?php if(isset($item) and $item->film_id == $film->id): ?> selected <?php endif; ?>><?php echo e($film->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="form-group">
                                        <label>Кинозал</label>
                                        <select name="hall_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                            <option value="" selected disabled>Сделайте выбор</option>
                                            <?php $__currentLoopData = $halls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($hall->id); ?>" <?php if( $item->hall_id == $hall->id): ?> selected <?php endif; ?>><?php echo e($hall->name_hall); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="form-group">
                                        <label>Дата начала </label>
                                        <input type="date" name="day" class="form-control" style="width: 100%;" required value="<?php echo e(old($item->day) ?? $item->day); ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['data'=>'start','type'=>'time','label'=>'Время начала','placeholder'=>'Введите данные','length'=>10,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['data'=>'duration_advertising','type'=>'number','label'=>'Рекламный блок, мин.','placeholder'=>'Введите данные','length'=>10,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['data'=>'duration_service','type'=>'number','label'=>'Обслуживание зала, мин.','placeholder'=>'Введите данные','length'=>10,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>











                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                    <label>Рекламы</label>
                                    <select name="advertisement_id[]" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="advertisement_id" tabindex="-1" aria-hidden="true" data-placeholder=" Сделайте выбор" multiple>
                                        <option value="<?php echo e(null); ?>"> -- </option>
                                        <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($advertisement->advertisings->id); ?>" <?php if(is_array(old('advertisement_id')) && in_array($advertisement->id, old('advertisement_id'))): ?> selected

                                                <?php endif; ?>
                                            ><?php echo e($advertisement->advertisings->title); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input text-dark" name="is_repeat" id="is_repeat" <?php if(isset($item) and $item->is_repeat == true): ?> checked <?php endif; ?>>
                                        <label class="custom-control-label" for="is_repeat">Повторение</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <div class="form-group mr-4">
                                <select name="status_id" class="form-control" style="width: 100%;" required>
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->id); ?>" <?php if(isset($item) and $item->status_id == $status->id): ?> selected <?php endif; ?>><?php echo e($status->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            <label for="delete" class="btn btn-danger ml-4">Удалить</label>
                        </div>
                    </form>
                    <form action="<?php echo e(route('admin.seances.destroy', [ 'id'=> $item->id ])); ?>" method="POST">
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

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/seances/edit.blade.php ENDPATH**/ ?>