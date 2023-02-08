
<tr>
    <td class="text-center">
        {{ $item->id }}
    </td>
    <td>
        <a href="#" target="_blank">
            {{ $item->user_email }}p
        </a>
    </td>
    <td>
        @if(strpos($item->films, 'name'))
            {{ str_replace(']', '', str_replace('[', '', str_replace('{name:', '', str_replace('}', '', str_replace('"', '', $item->films))))) }}
        @else
            {{str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->films)))}}
        @endif
{{--        {{substr($item->films, strpos($item->film, '['), 1)}}--}}

{{--        {{str_replace($item->films, '', '4')}}--}}
{{--    @foreach ($item->films as $film)--}}
{{--        {{$film}}--}}
{{--    @endforeach--}}
{{--        {{$item->films}}--}}
    </td>
    <td>
        @if( $item->section  == 'Finance')
            Финансовый отчет
        @elseif($item->section == 'Agreement')
            Договор на размещение контента
        @elseif($item->section == 'Delete')
            Заявление на ликвидацию контента
        @else
            Иной документ
            @endif
    </td>
    <td class="text-center">
        {{ $item->time ?? '--' }}
    </td>
{{--    <td class="text-center">--}}
{{--        <a href="{{ route('admin.seances.edit',$item->id) }}" class="text-primary mx-2">--}}
{{--            <i class="far fa-edit"></i>--}}
{{--        </a>--}}
{{--    </td>--}}
</tr>
