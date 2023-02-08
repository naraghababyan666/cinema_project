<tr>
    <td class="text-center">
        {{ $loop->iteration }}
    </td>
    <td>
{{--        <a href="" target="_blank">--}}
            {{$item->rent->rent_title}}
{{--        </a>--}}
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
    <td>
        {{ $item->rating }}
    </td>
    <td class="text-center">
        {{ $item->created_at ?? '--' }}
    </td>
    <td class="text-center">
        <a href="{{ route('admin.films.edit',$item->id) }}" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
        <!-- <form action="{{ route('admin.films.destroy',$item->id) }}" method="post" target="myFrame" id="myForm">
            @csrf
            @method('delete')
            <input type="submit" value="del"></input>
        </form> -->

    </td>
</tr>
