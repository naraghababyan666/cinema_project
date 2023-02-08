<?php
    $get_role = isset($_GET['role']) ? $_GET['role'] : null;
    $get_time = isset($_GET['time']) ? $_GET['time'] : null;
?>

<div class="row justify-content-end">
    <div class="col-sm-2 mb-3">
        <button type="button" class="btn btn-block btn-default dropdown-hover" data-toggle="dropdown">
            <i class="fas fa-users mr-2"></i>
            <?php if(isset($_GET['role']) and $_GET['role'] != null and $roles->find($_GET['role']) != null): ?>
                <?php echo e($roles->find($_GET['role'])->title); ?>

            <?php else: ?> Все
            <?php endif; ?>
            <i class="fas fa-angle-down ml-2"></i>
        </button>







    </div>

    <div class="col-sm-2 mb-3">
        <button type="button" class="btn btn-block btn-default dropdown-hover" data-toggle="dropdown">
            <i class="far fa-calendar-alt mr-2"></i>
            <?php if(isset($_GET['time']) and $_GET['time'] != null): ?>
                <?php if($_GET['time'] == 1): ?> 1 месяц
                <?php elseif($_GET['time'] == 3): ?> 3 месяца
                <?php elseif($_GET['time'] == 6): ?> 6 месяцeв
                <?php elseif($_GET['time'] == 12): ?> 1 год
                <?php elseif($_GET['time'] == 'all'): ?> Все
                <?php endif; ?>
            <?php else: ?> 1 месяц
            <?php endif; ?>
            <i class="fas fa-angle-down ml-2"></i>
        </button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item <?php if(!isset($_GET['time']) or $_GET['time'] == 1): ?> active <?php endif; ?>" href="<?php echo e(route('admin.users.index',['role'=>$get_role,'time'=>1])); ?>">1 месяц</a>
            <a class="dropdown-item <?php if(isset($_GET['time']) and $_GET['time'] == 3): ?> active <?php endif; ?>" href="<?php echo e(route('admin.users.index',['role'=>$get_role,'time'=>3])); ?>">3 месяца</a>
            <a class="dropdown-item <?php if(isset($_GET['time']) and $_GET['time'] == 6): ?> active <?php endif; ?>" href="<?php echo e(route('admin.users.index',['role'=>$get_role,'time'=>6])); ?>">6 месяцeв</a>
            <a class="dropdown-item <?php if(isset($_GET['time']) and $_GET['time'] == 12): ?> active <?php endif; ?>" href="<?php echo e(route('admin.users.index',['role'=>$get_role,'time'=>12])); ?>">1 год</a>
            <a class="dropdown-item <?php if(isset($_GET['time']) and $_GET['time'] == 'all'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.users.index',['role'=>$get_role,'time'=>'all'])); ?>">Все</a>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/users/_filters.blade.php ENDPATH**/ ?>