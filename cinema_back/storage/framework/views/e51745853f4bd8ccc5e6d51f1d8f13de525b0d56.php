<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2" style="width: 100%">
        <section class="content" style="width: 100%;">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">




                            <span class="font-weight-bold">Документы</span>

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
                                        Тип зала
                                    </th>
                                    <th>
                                        Название юр. лица
                                    </th>
                                    <th>
                                        Название кинотеатра
                                    </th>
                                    <th>
                                        Свидетельство ОГРН текст
                                    </th>
                                    <th>
                                        Свидетельство ОГРН файл
                                    </th>
                                    <th>
                                        Область
                                    </th>
                                    <th>
                                        город
                                    </th>
                                    <th>
                                        Дом
                                    </th>
                                    <th>
                                        Ответственные лица - должность
                                    </th>
                                    <th>
                                        Ответственные лица - фото
                                    </th>
                                    <th>
                                        (Новый зал)  Название кинозала
                                    </th>
                                    <th>
                                        (Новый зал)  Схема или чертеж зала
                                    </th>
                                    <th>
                                         (Новый зал) Звуковой оборудование - инструкция
                                    </th>
                                    <th>
                                         (Новый зал) Звуковой оборудование - фото
                                    </th>
                                    <th>
                                         (Новый зал) Ширина(м) экрана
                                    </th>
                                    <th>
                                         (Новый зал) Длина(м) экрана
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('admin.documents._table',['item'=>$document], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    .content-wrapper{
        background-color: transparent !important;
    }
    .content-wrapper .content .row .col-12{
        max-width: inherit !important;
        width: auto !important;
    }
</style>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/documents/index.blade.php ENDPATH**/ ?>