

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.films.create')); ?>" class="text-primary mr-2">
                                <i class="far fa-plus-square"></i>
                            </a>

                            <span class="font-weight-bold">Фильмы</span>

                            <div class="card-tools">
                                <?php echo $__env->make('admin._include._card_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $__env->make('admin.films._filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            №
                                        </th>
                                        <th>
                                            В прокате
                                        </th>
                                        <th>
                                            Название
                                        </th>
                                        <th>
                                            Жанры
                                        </th>
                                        <th>
                                            Формат
                                        </th>
                                        <th>
                                            Статус
                                        </th>
                                        <th>
                                            Рейтинг
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
                                    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('admin.films._table',['item'=>$film], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/films/index.blade.php ENDPATH**/ ?>