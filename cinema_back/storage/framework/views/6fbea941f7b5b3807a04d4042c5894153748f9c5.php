<li class="nav-item has-treeview <?php if(Route::is('*.support.*')): ?> menu-open <?php else: ?> menu-hide <?php endif; ?>">
    <a href="<?php echo e(route('admin.support.index')); ?>" class="nav-link <?php if(Route::is('*.support.*')): ?> active <?php endif; ?>">
        <i class="nav-icon fas fa-comment"></i>
        <p>
            Сообщение
        </p>
    </a>
</li>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar/support.blade.php ENDPATH**/ ?>