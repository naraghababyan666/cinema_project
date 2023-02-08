<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ExtraCinema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="/admin/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">Alexander Pierce</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @if(Route::is('admin.*'))
                    @include('admin._layout.sidebar.seances') <!-- Сеансы -->
                    @include('admin._layout.sidebar.support') <!-- Сообщение -->
                    @include('admin._layout.sidebar.films') <!-- Фильмы -->
                    @include('admin._layout.sidebar.users') <!-- Пользователи -->
                    @include('admin._layout.sidebar.projectors') <!-- Проекторы -->
                    @include('admin._layout.sidebar.advertisement') <!-- Проекторы -->
                    @include('admin._layout.sidebar.halls') <!-- Кинозалы -->
                    @include('admin._layout.sidebar.documents') <!-- Документы -->
                    @include('admin._layout.sidebar.documents_for_holders') <!-- Документы -->
                    @include('admin._layout.sidebar.document_eais') <!-- Документ Еаис -->
                    @include('admin._layout.sidebar.document_eais_for_client') <!-- Документ Еаис -->
                    @include('admin._layout.sidebar.request') <!-- запросы -->
                    @include('admin._layout.sidebar.payment') <!-- Сущности -->
                    @include('admin._layout.sidebar.entities') <!-- Сущности -->
                @elseif(Route::is('creator.*'))
                    @include('creator._layout.sidebar.films') <!-- Фильмы -->
                @elseif(Route::is('operator.*'))
                    @include('operator._layout.sidebar.seances') <!-- Сеансы -->
                @elseif(Route::is('cashier.*'))

                @else

                @endif
            </ul>
        </nav>
    </div>
</aside>
