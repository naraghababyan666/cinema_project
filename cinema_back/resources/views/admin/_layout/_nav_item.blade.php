@php
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
@endphp

<li class="nav-item">
    <a href="@isset($get){{ route("$link",$get) }}@else{{ route("$link") }}@endisset" class="nav-link @isset($color) text-{{ $color }} @endisset
        @if((Route::is($route) and !isset($get)) or (Route::is($route) and isset($get) and isset($_GET) and array_uintersect($_GET,$get,"strcasecmp") != []))) active @endif">
        <i class="far fa-dot-circle nav-icon"></i>
        <p>{{ $title }}</p>
        @isset($span)<span class="right badge badge-danger">{{ $span }}</span>@endisset
    </a>
</li>
@php $sublink = null; $route = null; $link = null; $get = null; $color = null; $span = null; @endphp
