@php
    $get_genre = isset($_GET['genre']) ? $_GET['genre'] : null;
    $get_time = isset($_GET['time']) ? $_GET['time'] : null;
@endphp

<div class="row justify-content-end">
{{--    <div class="col-sm-2 mb-3">--}}
{{--        <button type="button" class="btn btn-block btn-default dropdown-hover" data-toggle="dropdown">--}}
{{--            <i class="far fa-list-alt mr-2"></i>--}}
{{--            @if(isset($_GET['genre']) and $_GET['genre'] != null and $roles->find($_GET['genre']) != null)--}}
{{--                {{ $roles->find($_GET['genre'])->title }}--}}
{{--            @else Все--}}
{{--            @endif--}}
{{--            <i class="fas fa-angle-down ml-2"></i>--}}
{{--        </button>--}}

{{--        <div class="dropdown-menu" role="menu">--}}
{{--            @foreach($genres as $genre)--}}
{{--                <a class="dropdown-item @if(isset($_GET['genre']) and $_GET['genre'] == $genre->id) active @endif" href="{{ route('creator.films.index',['genre'=>$genre->id,'time'=>$get_time]) }}">{{ $genre->title }}</a>--}}
{{--            @endforeach--}}
{{--            <a class="dropdown-item @if(!isset($_GET['genre']) or $_GET['genre'] == 'all') active @endif" href="{{ route('creator.films.index',['genre'=>'all','time'=>$get_time]) }}">Все</a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="col-sm-2 mb-3">
        <button type="button" class="btn btn-block btn-default dropdown-hover" data-toggle="dropdown">
            <i class="far fa-calendar-alt mr-2"></i>
            @if(isset($_GET['time']) and $_GET['time'] != null)
                @if($_GET['time'] == 1) 1 месяц
                @elseif($_GET['time'] == 3) 3 месяца
                @elseif($_GET['time'] == 6) 6 месяцeв
                @elseif($_GET['time'] == 12) 1 год
                @elseif($_GET['time'] == 'all') Все
                @endif
            @else 1 месяц
            @endif
            <i class="fas fa-angle-down ml-2"></i>
        </button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item @if(!isset($_GET['time']) or $_GET['time'] == 1) active @endif" href="{{ route('admin.seances.index',['genre'=>$get_genre,'time'=>1]) }}">1 месяц</a>
            <a class="dropdown-item @if(isset($_GET['time']) and $_GET['time'] == 3) active @endif" href="{{ route('admin.seances.index',['genre'=>$get_genre,'time'=>3]) }}">3 месяца</a>
            <a class="dropdown-item @if(isset($_GET['time']) and $_GET['time'] == 6) active @endif" href="{{ route('admin.seances.index',['genre'=>$get_genre,'time'=>6]) }}">6 месяцeв</a>
            <a class="dropdown-item @if(isset($_GET['time']) and $_GET['time'] == 12) active @endif" href="{{ route('admin.seances.index',['genre'=>$get_genre,'time'=>12]) }}">1 год</a>
            <a class="dropdown-item @if(isset($_GET['time']) and $_GET['time'] == 'all') active @endif" href="{{ route('admin.seances.index',['genre'=>$get_genre,'time'=>'all']) }}">Все</a>
        </div>
    </div>
</div>
