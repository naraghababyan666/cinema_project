<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2" style="width: fit-content;">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">




                            <span class="font-weight-bold">Оплата по карте</span>

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
                                        ФИО
                                    </th>
                                    <th>
                                        Банк получатель
                                    </th>
                                    <th>
                                        Номер счета получателя
                                    </th>
                                    <th >
                                        ИНН
                                    </th>
                                    <th >
                                        КПП
                                    </th>
                                    <th >
                                        БИК
                                    </th>
                                    <th>
                                        Доступно к выводу
                                    </th>
                                    <th>
                                        Сумма к выводу
                                    </th>
                                    <th class="text-center w-auto">
                                        Отправлено
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('admin.payment_to_card._table',['item'=>$payment], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/payment_to_card/index.blade.php ENDPATH**/ ?>