<li class="nav-item has-treeview <?php if(Route::is('*.genres.*')): ?> menu-open <?php else: ?> menu-hide <?php endif; ?>">
    <a href="#" class="nav-link <?php if(Route::is('*.genres.*')): ?> active <?php endif; ?>">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Настройки
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ml-3">
        <?php echo $__env->make('admin._layout._nav_item',['title'=>'Жанры','link'=>'admin.genres','sublink'=>'index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
</li>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar/entities.blade.php ENDPATH**/ ?>