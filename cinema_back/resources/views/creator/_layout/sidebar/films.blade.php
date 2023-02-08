<li class="nav-item has-treeview @if(Route::is('*.films.*')) menu-open @else menu-hide @endif">
    <a href="{{ route('creator.films.index') }}" class="nav-link @if(Route::is('*.films.*')) active @endif">
        <i class="nav-icon fas fa-film"></i>
        <p>
            Фильмы
        </p>
    </a>
</li>
