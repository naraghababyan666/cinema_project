<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>






    </ul>
    <?php echo $__env->make('admin._include._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- SEARCH FORM -->











    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php if(\Illuminate\Support\Facades\Session::get('logged')): ?>
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="">
                    <i class="far fa-question-circle"></i>
                    <span class="badge badge-danger navbar-badge"></span>
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                        class="fas fa-th-large"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
                </a>
                <form id="logout-form" action="<?php echo e(route('logout.post')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        <?php else: ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('login')); ?>" class="nav-link"  >
                        Вход
                    </a>
                </li>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/navbar.blade.php ENDPATH**/ ?>