<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="<?php echo e(route('home')); ?>" class="brand-link">
        <img src="/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ExtraCinema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->









        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <?php if(Route::is('admin.*')): ?>
                    <?php echo $__env->make('admin._layout.sidebar.seances', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Сеансы -->
                    <?php echo $__env->make('admin._layout.sidebar.support', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Сообщение -->
                    <?php echo $__env->make('admin._layout.sidebar.films', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Фильмы -->
                    <?php echo $__env->make('admin._layout.sidebar.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Пользователи -->
                    <?php echo $__env->make('admin._layout.sidebar.projectors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Проекторы -->
                    <?php echo $__env->make('admin._layout.sidebar.advertisement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Проекторы -->
                    <?php echo $__env->make('admin._layout.sidebar.halls', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Кинозалы -->
                    <?php echo $__env->make('admin._layout.sidebar.documents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Документы -->
                    <?php echo $__env->make('admin._layout.sidebar.documents_for_holders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Документы -->
                    <?php echo $__env->make('admin._layout.sidebar.document_eais', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Документ Еаис -->
                    <?php echo $__env->make('admin._layout.sidebar.document_eais_for_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Документ Еаис -->
                    <?php echo $__env->make('admin._layout.sidebar.request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- запросы -->
                    <?php echo $__env->make('admin._layout.sidebar.payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Сущности -->
                    <?php echo $__env->make('admin._layout.sidebar.entities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Сущности -->
                <?php elseif(Route::is('creator.*')): ?>
                    <?php echo $__env->make('creator._layout.sidebar.films', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Фильмы -->
                <?php elseif(Route::is('operator.*')): ?>
                    <?php echo $__env->make('operator._layout.sidebar.seances', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Сеансы -->
                <?php elseif(Route::is('cashier.*')): ?>

                <?php else: ?>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar.blade.php ENDPATH**/ ?>