<tr>
    <td class="text-center">
        {{ $loop->iteration  }}
    </td>

    <td>
        {{ $item->id }}
    </td>
    <td>
        {{ $item->user->name ?? '--' }} <br/>
        {{ $item->user->email ?? '--' }}
    </td>
    <td>
        {{ $item->name_theatre }}
    </td>
    <td>
        {{ $item->name_hall }}
    </td>
    <td>
        {{ $item->region ?? '--' }}
    </td>
    <td>
        {{ $item->city ?? '--' }}
    </td>
    <td>
        {{ $item->house ?? '--' }}
    </td>
    <td>
        {{ $item->hall_rows ?? '--' }}
    </td>
    <td>
        {{ $item->hall_seats ?? '--' }}
    </td>
    <td>
        {{ $item->voice_hardware ?? '--' }}
    </td>
    <td>
        {{ $item->screen_width ?? '--' }}
    </td>
    <td>
        {{ $item->screen_length ?? '--' }}
    </td>
{{--    <td class="text-center">--}}
{{--        <a class="text-primary mx-2" href="{{ route('admin.halls.edit', $item->id) }}" >--}}
{{--            <i class="far fa-edit"></i>--}}
{{--        </a>--}}
{{--        @include('admin.user_roles._credit_modal')--}}
{{--        <a class="text-danger" data-toggle="modal" data-target="#modal{{ $item->id }}delete">--}}
{{--            <i class="far fa-trash-alt"></i>--}}
{{--        </a>--}}
{{--        @include('admin.user_roles._delete_modal')--}}
{{--    </td>--}}
</tr>
