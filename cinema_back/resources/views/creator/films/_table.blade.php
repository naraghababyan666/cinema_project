<tr>
    <td class="text-center">
        {{ $loop->iteration }}
    </td>

    <td>
        {{ $item->title }}
    </td>
    <td>
        {{ implode(', ',$item->genres->pluck('title')->all()) }}
    </td>
    <td>
        {{ $item->format->title }}
    </td>
    <td class="text-center">
        @if($item->is_active == true)
            <span class="badge bg-success">активен</span>
        @else
            <span class="badge bg-danger">заблокирован</span>
        @endif
    </td>
    <td class="text-center">
        {{ $item->created_at ?? '--' }}
    </td>
    <td class="text-center">
        <a href="{{ route('creator.films.edit',$item->id) }}" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>
