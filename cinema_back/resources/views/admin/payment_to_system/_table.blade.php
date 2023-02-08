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
        {{ $item->card_number_extrafintech }}
    </td>
    <td>
        {{ $item->bank_name }}
    </td>
    <td>
        {{ $item->card_number_receiver }}
    </td>
    <td>
        {{ $item->inn }}
    </td>
    <td>
        {{ $item->kpp }}
    </td>
    <td>
        {{ $item->bik }}
    </td>
    <td>
        {{ $item->user->balance }} RUB
    </td>
    <td>
        {{ $item->wanted_total }} RUB
    </td>
    <td class="text-center">
        {{ $item->created_at ?? '--' }}
    </td>
    <td class="text-center">
        @if($item->verified == 1)
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="limegreen" class="bi bi-check2-all" viewBox="0 0 16 16">
                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
            </svg>
        @elseif($item->verified == 2)
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-check2-all" viewBox="0 0 16 16">
                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
            </svg>
        @else
            <div style="display: flex; justify-content: center;">
                <form action="{{route('admin.payment_to_system.change', ['id' => $item->id, 'value' => 1, 'user_id' => $item->user->id, 'wanted_total' => $item->wanted_total])}}" method="POST">
                    @csrf
                    <button type='submit' class="text-primary mx-2" style="border: none; background: transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                </form>
                <form action="{{route('admin.payment_to_system.change', ['id' => $item->id, 'value' => 2])}}" method="POST">
                    @csrf
                    <button type='submit' class="text-primary mx-2" style="border: none; background: transparent">
                        <svg xmlns="http://www.w3.org/2000/svg"width="25" height="22" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                        </svg>
                    </button>
                </form>
            </div>
        @endif
    </td>
</tr>
