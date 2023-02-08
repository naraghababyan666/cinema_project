<?php
    if(isset($sublink) and $sublink != null)
    {
        $route = $link . '.*';
        $link = $link . '.' . $sublink;
    }
    else
    {
        $link = $link;
        $route = $link;
    }
?>

<li class="nav-item">
    <a href="<?php if(isset($get)): ?><?php echo e(route("$link",$get)); ?><?php else: ?><?php echo e(route("$link")); ?><?php endif; ?>" class="nav-link <?php if(isset($color)): ?> text-<?php echo e($color); ?> <?php endif; ?>
        <?php if((Route::is($route) and !isset($get)) or (Route::is($route) and isset($get) and isset($_GET) and array_uintersect($_GET,$get,"strcasecmp") != [])): ?>) active <?php endif; ?>">
        <i class="far fa-dot-circle nav-icon"></i>
        <p><?php echo e($title); ?></p>
        <?php if(isset($span)): ?><span class="right badge badge-danger"><?php echo e($span); ?></span><?php endif; ?>
    </a>
</li>
<?php $sublink = null; $route = null; $link = null; $get = null; $color = null; $span = null; ?>
<?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/_layout/_nav_item.blade.php ENDPATH**/ ?>