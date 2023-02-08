<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin._layout.links')

    <title>ExtraCinema</title>
    @include('admin._layout.links')
    @stack('styles')

</head>
<body class="hold-transition">
    <div class="wrapper">
        @include('admin._layout.navbar')
        @include('admin._layout.sidebar')

        @yield('content')

        @include('admin._layout.footer')
    </div>
    @include('admin._layout.scripts')
    @stack('scripts')
</body>
</html>
