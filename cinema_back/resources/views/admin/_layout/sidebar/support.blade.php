<li class="nav-item has-treeview @if(Route::is('*.support.*')) menu-open @else menu-hide @endif">
    <a href="{{ route('admin.support.index') }}" class="nav-link @if(Route::is('*.support.*')) active @endif">
        <i class="nav-icon fas fa-comment"></i>
        <p>
            Сообщение
        </p>
    </a>
</li>
