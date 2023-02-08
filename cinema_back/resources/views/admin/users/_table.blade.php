<tr>
    <td class="text-center">
        {{ $loop->iteration }}
    </td>

    <td>
        {{ $item->name ?? '--' }}
    </td>
    <td>
        {{ $item->email ?? '--' }}
    </td>
    <td>
        {{ $item->role->title }}
    </td>
    <td>
        {{ $item->percent }} %
    </td>
        {{--    <td class="text-center">--}}
        {{--        @if($item->is_active == true)--}}
        {{--            <span class="badge bg-success">активен</span>--}}
        {{--        @else--}}
        {{--            <span class="badge bg-danger">заблокирован</span>--}}
        {{--        @endif--}}
        {{--    </td>--}}
    <td>
        {{ $item->country_code }}
    </td>
    <td>
        {{ $item->phone }}
    </td>
    <td class="text-center">
        {{ $item->created_at ?? '--' }}
    </td>
    <td class="text-center">
        <a href="{{ route('admin.users.edit',$item->id) }}" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>
