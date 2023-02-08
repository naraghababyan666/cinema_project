<tr>
    <td class="text-center">
        {{ $loop->iteration }}
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
        <a href="{{ route('operator.seances.edit',$item->id) }}" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>
