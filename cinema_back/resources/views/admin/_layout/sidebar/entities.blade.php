<li class="nav-item has-treeview @if(Route::is('*.genres.*')) menu-open @else menu-hide @endif">
    <a href="#" class="nav-link @if(Route::is('*.genres.*')) active @endif">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Настройки
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ml-3">
        @include('admin._layout._nav_item',['title'=>'Жанры','link'=>'admin.genres','sublink'=>'index'])
    </ul>
</li>
