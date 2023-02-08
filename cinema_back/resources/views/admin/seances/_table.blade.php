<tr>
    <td class="text-center">
        {{ $loop->iteration }}
    </td>
    <td>
        <a href="#" target="_blank">
            {{ $item->user->name ?? 'Admin' }}<br>
            {{ $item->user->email ?? '--' }}
        </a>
    </td>
    <td>
        {{ $item->film->title }}
    </td>
    <td>
        {{ $item->day }}
    </td>
    <td>
        {{ $item->start }}
    </td>
    <td>
            @if(count($item->advertisement) > 0)
                @foreach($item->advertisement as $name)
                    {{ $name->title }}<br />
                @endforeach
            @else
                <p>---</p>
            @endif

{{--        {{ item->advertisement->title$ ?? '--' }}--}}
    </td>
    <td>
        @if(count($item->advertisement) > 0)
            @foreach($item->advertisement as $file)
                <a href="{{ 'http://'.$_SERVER['HTTP_HOST']."/storage/videos/".$file->file }}">Видео ролик {{$file->title}}</a><br />
            @endforeach
        @else
            <p>---</p>
        @endif
{{--        @if($item->advertisement)--}}
{{--            <a href="{{ 'http://'.$_SERVER['HTTP_HOST']."/storage/videos/".$item->advertisement->file }}">Видео ролик</a>--}}
{{--        @else--}}
{{--            Нет видео ролик--}}
{{--        @endif--}}
    </td>
    <td>
        {{ $item->tickets_price }}
    </td>
    <td>
        {{ $item->film->duration + $item->duration_advertising + $item->duration_service }}<br>
        <span class="text-primary" data-toggle="tooltip" title="Фильм">{{ $item->film->duration }}</span> +
        <span class="text-primary" data-toggle="tooltip" title="Реклама">{{ $item->duration_advertising }}</span> +
        <span class="text-primary" data-toggle="tooltip" title="Уборка">{{ $item->duration_service }}</span>
    </td>
    <td class="text-center">
        <span class="badge bg-{{ $item->status->color }}">{{ $item->status->title }}</span>
    </td>
    <td class="text-center">
        {{ $item->created_at ?? '--' }}
    </td>
    <td class="text-center">
        <a href="{{ route('admin.seances.edit',$item->id) }}" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>
