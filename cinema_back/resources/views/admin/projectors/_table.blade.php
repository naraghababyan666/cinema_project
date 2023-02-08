<tr>
    <td class="text-center">
        {{ $loop->iteration }}
    </td>
    <td>
        <a href="#" target="_blank">
            {{ $item->user->name }}<br>
            {{ $item->user->email }}
        </a>
    </td>
    <td>
        {{ $item->projector_name }}
    </td>
    <td>
        {{ $item->projector_number }}
    </td>
    <td class="text-center">
        {{ $item->created_at ?? '--' }}
    </td>
    <td class="text-center">
{{--        <a href="{{ route('admin.seances.edit',$item->id) }}" class="text-primary mx-2">--}}
{{--            <i class="far fa-edit"></i>--}}
{{--        </a>--}}
    </td>
</tr>
