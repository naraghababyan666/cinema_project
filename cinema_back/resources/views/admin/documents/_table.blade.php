<tr>
    <td class="text-center">
        {{ $item->id }}
    </td>
    <td>
        <a href="#" target="_blank">
            {{ $item->user->name }}<br>
            {{ $item->user->email }}
        </a>
    </td>
    <td>
        @if( $item->hall_type == 'municipal')
            {{'Муниципиальный'}}
        @else
            {{ 'Частный' }}
        @endif
    </td>
    <td>
        {{ $item->personName }}
    </td>
    <td>
        {{ $item->name_theatre }}
    </td>
    <td>
        {{ $item->document_ogrn_text }}
    </td>
    <td >
        {{ $item->document_ogrn_photo }}
    </td>
    <td >
        {{ $item->region }}
    </td>
    <td >
        {{ $item->city }}
    </td>
    <td >
        {{ $item->house }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->person_name))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('{', '', str_replace('}', '', str_replace('"', '', $item->person_photo))))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->new_hall_name))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('{', '', str_replace('}', '', str_replace('"', '', $item->new_hall_scheme_photo))))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->new_hall_hardware_description))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('{', '', str_replace('}', '', str_replace('"', '', $item->new_hall_hardware_photo))))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->new_hall_screen_width))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->new_hall_screen_length))) }}
    </td>
{{--    <td>--}}
{{--        {{ $item->personName }}--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        {{ $item->personName }}--}}
{{--    </td>--}}
{{--    <td class="text-center">--}}
{{--        {{ $item->created_at ?? '--' }}--}}
{{--    </td>--}}
    <td class="text-center">
        @if($item->verified == 1)
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
            </svg>
        @else
            <form action="{{route('admin.documents.change', ['id' => $item->id, 'user_id' => $item->user->id])}}" method="POST">
{{--                {{route('admin.documents.change', $item->user->id)}}--}}
                @csrf
                <button type='submit' class="text-primary mx-2" style="border: none; background: transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>
            </form>
        @endif
    </td>
</tr>

