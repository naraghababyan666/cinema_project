<li class="nav-item has-treeview <?php if(Route::is('*.seances.*')): ?> menu-open <?php else: ?> menu-hide <?php endif; ?>">
    <a href="<?php echo e(route('admin.seances.index')); ?>" class="nav-link <?php if(Route::is('*.seances.*')): ?> active <?php endif; ?>">
        <i class="nav-icon fas fa-video"></i>
        <p>
            Сеансы
        </p>
    </a>
</li>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar/seances.blade.php ENDPATH**/ ?>