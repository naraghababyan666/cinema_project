<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2" style="width: 100%; min-width: 80%">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">




                            <span class="font-weight-bold">Проекторы</span>

                            <div class="card-tools">
                                <?php echo $__env->make('admin._include._card_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="card-body">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        №
                                    </th>
                                    <th>
                                        Пользователь
                                    </th>
                                    <th>
                                        Имя проектора
                                    </th>
                                    <th>
                                        Номер проектора
                                    </th>
                                    <th>
                                        Дата добавления
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $projectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('admin.projectors._table',['item'=>$projector], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/projectors/index.blade.php ENDPATH**/ ?>