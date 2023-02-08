

<?php $__env->startSection('content'); ?>
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row" id="editor">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="<?php if(isset($item)): ?><?php echo e(route('admin.users.update',['id'=>$item->id])); ?><?php else: ?><?php echo e(route('admin.users.update')); ?><?php endif; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                        <?php if(isset($item)): ?> <?php echo method_field('PATCH'); ?> <?php endif; ?>
                        <?php echo csrf_field(); ?>

                        <div class="card-header">
                            <a href="<?php echo e(route('admin.users.index')); ?>" class="text-primary mr-2">
                                <i class="fas fa-angle-double-left"></i>
                            </a>

                            <span class="font-weight-bold"><?php if(isset($item)): ?>Редактирование <?php else: ?> Создание <?php endif; ?> пользователя</span>

                            <div class="card-tools">
                                <?php echo $__env->make('admin._include._card_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            
                            
                            
                            

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['name'=>'name', 'data'=>'Имя','label'=>'name','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('name') ?? $item->name ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['name'=>'email', 'data'=>'E-mail','label'=>'email','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('email') ?? $item->email ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Роль</label>
                                        <select name="role_id" class="form-control select2bs4" style="width: 100%;" required  value="<?php echo e(old('role_id') ?? $item->role_id); ?>">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php if(isset($item) and $item->role_id == $role->id): ?> selected <?php endif; ?>><?php echo e($role->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: flex; align-items: center">
                                <div class="col-md-4 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['name' => 'percent','data'=>'percent','label'=>'Процент с пользователи','type'=>'number','placeholder'=>'Введите процент','length'=>3, 'max' => 100,'required'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['name'=>'country_code', 'data'=>'телефонный код','label'=>'code','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('country_code') ?? $item->country_code ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <?php echo $__env->make('admin._include.form.input',['name'=>'phone', 'data'=>'номер телефона','label'=>'phone','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('phone') ?? $item->phone ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <input type="checkbox" name="is_active" data-bootstrap-switch data-off-color="danger" data-on-color="success" <?php if(!isset($item) or $item->is_active == true): ?> checked <?php endif; ?> >
                            <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            <label for="delete" class="btn btn-danger ml-4">Удалить</label>
                        </div>
                    </form>
                    <form action="<?php echo e(route('admin.users.destroy', [ 'id'=> $item->id ])); ?>" method="POST">
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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('specification');
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>