<li class="nav-item has-treeview @if(Route::is('*.payment.*')) menu-open @else menu-hide @endif">

    <a href="#" class="nav-link @if(Route::is('*.payment_to_system.*')) active
                                @elseif(Route::is('*.payment_to_card.*')) active
                                @elseif(Route::is('*.payment_to_requisite.*')) active
                                @elseif(Route::is('*.make_percent.*')) active
                            @endif">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
        </svg>
        <p>
            Финансы
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ml-3" style="font-size: 14px;">
        @include('admin._layout._nav_item',['title'=>'Платежная система','link'=>'admin.payment_to_system','sublink'=>'index'])
    </ul>
    <ul class="nav nav-treeview ml-3" style="font-size: 14px;">
        @include('admin._layout._nav_item',['title'=>'Оплата по карте','link'=>'admin.payment_to_card','sublink'=>'index'])
    </ul>
    <ul class="nav nav-treeview ml-3" style="font-size: 14px;">
        @include('admin._layout._nav_item',['title'=>'Оплата по реквизитам','link'=>'admin.payment_to_requisite','sublink'=>'index'])
    </ul>
</li>
