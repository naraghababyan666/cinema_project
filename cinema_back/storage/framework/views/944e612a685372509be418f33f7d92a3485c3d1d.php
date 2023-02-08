<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2" style="width: fit-content;">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">




                            <span class="font-weight-bold">Кинозалы</span>

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
                                        Id Документа
                                    </th>
                                    <th>
                                        Пользователь
                                    </th>
                                    <th>
                                        Название кинотеатра
                                    </th>
                                    <th>
                                        Название кинозала
                                    </th>
                                    <th>
                                        Район
                                    </th>
                                    <th>
                                        Город
                                    </th>
                                    <th>
                                        Дом
                                    </th>
                                    <th>
                                        Количество рядов
                                    </th>
                                    <th>
                                        Количество мест в ряду
                                    </th>
                                    <th>
                                       Звуковое оборудование
                                    </th>
                                    <th>
                                        Ширина(м) экрана
                                    </th>
                                    <th>
                                        Длина(м) экрана
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $halls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('admin.halls._table',['item'=>$hall], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<style>
    .content-wrapper .content .row .col-12{
        max-width: inherit !important;
        width: auto !important;
    }
</style>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/halls/index.blade.php ENDPATH**/ ?>