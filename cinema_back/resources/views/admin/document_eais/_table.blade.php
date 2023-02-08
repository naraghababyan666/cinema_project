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
        {{$item->date_of_completion}}
    </td>
    <td>
        {{$item->demonistrator_film_name}}
    </td>
    <td>
        {{$item->id_hall}}
    </td>
    <td>
        {{$item->cinema_network_name}}
    </td>
    <td>
        {{$item->cinema_network_id}}
    </td>
    <td>
        {{$item->cinema_network_email}}
    </td>
    <td>
        {{$item->legal_entity_name}}
    </td>
    <td>
        {{$item->legal_entity_address}}
    </td>
    <td>
        {{$item->ogrn_code}}
    </td>
    <td>
        {{$item->inn}}
    </td>
    <td>
        {{$item->demonistrator_film_region}}
    </td>
    <td>
        {{$item->demonistrator_film_city}}
    </td>
    <td>
        {{$item->demonistrator_film_locality}}
    </td>
    <td>
        {{$item->demonistrator_film_street}}
    </td>
    <td>
        {{$item->demonistrator_film_email}}
    </td>
    <td>
        {{$item->telephone_fax}}
    </td>
    <td>
        {{$item->demonistrator_film_site}}
    </td>
    <td>
        {{$item->autoinformer_number}}
    </td>
    <td>
        {{$item->full_name}}
    </td>
    <td>
        {{$item->name_and_hardware_name_hall}}
    </td>
    <td>
        {{$item->name_and_hardware_seats_in_hall}}
    </td>
    <td>
        {{$item->name_and_hardware_support}}
    </td>
    <td>
        {{$item->hardware_projector_manufacturer}}
    </td>
    <td>
        {{$item->hardware_projector_model}}
    </td>
    <td>
        {{$item->hardware_projector_serial_number}}
    </td>
    <td>
        {{$item->hardware_server_manufacturer}}
    </td>
    <td>
        {{$item->hardware_server_model}}
    </td>
    <td>
        {{$item->hardware_server_serial_number}}
    </td>
    <td>
        {{$item->hardware_type_name_hall}}
    </td>
    <td>
        {{ strtoupper(str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->hardware_type)))) }}
    </td>
    <td>
        {{ str_replace(']', '', str_replace('[', '', str_replace('"', '', $item->hardware_type_other_settings))) }}
    </td>
    <td>
        {{$item->hardware_type_add_date}}
    </td>
    <td>
        {{$item->voice_hardware_name_hall}}
    </td>
    <td>
        {{$item->voice_hardware_analog_manufacturer}}
    </td>
    <td>
        {{$item->voice_hardware_analog_model}}
    </td>
    <td>
        {{$item->voice_hardware_digital_manufacturer}}
    </td>
    <td>
        {{$item->voice_hardware_digital_model}}
    </td>
    <td>
        {{$item->ticketing_software_manufacturer}}
    </td>
    <td>
        {{$item->placement_demonistration_film}}
    </td>
    <td>
        {{$item->regularity_film_showing}}
    </td>

    <td class="text-center">
        <a href="{{ route('admin.seances.edit',$item->id) }}" class="text-primary mx-2">
            <i class="far fa-edit"></i>
        </a>
    </td>
</tr>

