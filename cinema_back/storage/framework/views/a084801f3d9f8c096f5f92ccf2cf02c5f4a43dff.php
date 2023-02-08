<li class="nav-item has-treeview <?php if(Route::is('*.request.*')): ?> menu-open <?php else: ?> menu-hide <?php endif; ?>">
    <a href="<?php echo e(route('admin.request.index')); ?>" class="nav-link <?php if(Route::is('*.request.*')): ?> active <?php endif; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
        </svg>
        <p>
            Отчеты
        </p>
    </a>
</li>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/sidebar/request.blade.php ENDPATH**/ ?>