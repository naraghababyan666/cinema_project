<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="index3.html" class="nav-link">Home</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Contact</a>--}}
{{--        </li>--}}
    </ul>
    @include('admin._include._messages')

    <!-- SEARCH FORM -->
{{--    <form class="form-inline ml-3">--}}
{{--        <div class="input-group input-group-sm">--}}
{{--            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-navbar" type="submit">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if(\Illuminate\Support\Facades\Session::get('logged'))
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{-- route('admin.questions.index') --}}">
                    <i class="far fa-question-circle"></i>
                    <span class="badge badge-danger navbar-badge">{{-- \App\Models\User::questionsCount() --}}</span>
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                        class="fas fa-th-large"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
                </a>
                <form id="logout-form" action="{{ route('logout.post') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link"  >
                        Вход
                    </a>
                </li>
        @endauth
    </ul>
</nav>
