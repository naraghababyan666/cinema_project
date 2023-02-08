<li class="nav-item has-treeview @if(Route::is('*.seances.*')) menu-open @else menu-hide @endif">
    <a href="{{ route('admin.seances.index') }}" class="nav-link @if(Route::is('*.seances.*')) active @endif">
        <i class="nav-icon fas fa-video"></i>
        <p>
            Сеансы
        </p>
    </a>
</li>
