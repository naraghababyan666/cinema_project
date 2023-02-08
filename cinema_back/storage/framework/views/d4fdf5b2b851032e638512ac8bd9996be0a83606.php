<li class="nav-item has-treeview <?php if(Route::is('*.films.*')): ?> menu-open <?php else: ?> menu-hide <?php endif; ?>">
    <a href="<?php echo e(route('admin.films.index')); ?>" class="nav-link <?php if(Route::is('*.films.*')): ?> active <?php endif; ?>">
        <i class="nav-icon fas fa-film"></i>
        <p>
            Фильмы
        </p>
    </a>
</li>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar/films.blade.php ENDPATH**/ ?>