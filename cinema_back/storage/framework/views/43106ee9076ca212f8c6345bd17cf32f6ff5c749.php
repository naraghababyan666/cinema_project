<li class="nav-item has-treeview <?php if(Route::is('*.users.*')): ?> menu-open <?php else: ?> menu-hide <?php endif; ?>">
    <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link <?php if(Route::is('*.users.*')): ?> active <?php endif; ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Пользователи
        </p>
    </a>
</li>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar/users.blade.php ENDPATH**/ ?>