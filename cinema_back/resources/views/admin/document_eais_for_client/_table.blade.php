<tr>
    <td class="text-center">
        {{ $item->id }}
    </td>
    <td>
        {{$item->user->name}}
    </td>
    <td>
        Область. {{$item->halls->region}}, город. {{$item->halls->city}}
    </td>
    <td>
        {{$item->email}}
    </td>
    <td>
        {{$item->country_code}}
    </td>
    <td>
        {{$item->phone}}
    </td>
    <td>
        {{$item->created_at}}
    </td>
</tr>

