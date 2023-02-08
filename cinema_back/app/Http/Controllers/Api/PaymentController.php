<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\MakePercent;
use App\Models\PaymentToCard;
use App\Models\PaymentToRequisite;
use App\Models\PaymentToSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentToSystem(PaymentRequest $request)
    {

        $info = $request->all();
        $request->validate([
            'data.card_number_extrafintech' => 'required|string',
            'data.bank_name' => 'required|string',
            'data.card_number_receiver' => 'required|numeric',
            'data.inn' => 'required|numeric',
            'data.kpp' => 'required|numeric',
            'data.bik' => 'required|numeric',
            'income' => 'required|numeric',
            'wantedTotal' => 'required|numeric',
        ]);
        if ($info['wantedTotal'] > $info['income']) {
            return response()->json(['fail' => 'Invalid sum']);
        } else {
            PaymentToSystem::create([
                'user_id' => Auth::id(),
                'card_number_extrafintech' => $info['data']['card_number_extrafintech'],
                'bank_name' => $info['data']['bank_name'],
                'card_number_receiver' => $info['data']['card_number_receiver'],
                'inn' => $info['data']['inn'],
                'kpp' => $info['data']['kpp'],
                'bik' => $info['data']['bik'],
                'all_income' => $info['income'],
                'wanted_total' => $info['wantedTotal'],
                'balance' => $info['income'] - $info['wantedTotal'],
            ]);
        }
        return response()->json(['success' => 'Successfully sent request']);
    }

    public function paymentToCard(PaymentRequest $request)
    {
        $infoCard = $request->all();
        $request->validate([
            'full_name' => 'required',
            'bank_name' => 'required|string',
            'card_number_receiver' => 'required',
            'inn' => 'required|numeric',
            'kpp' => 'required|numeric',
            'bik' => 'required|numeric',
            'income' => 'required|numeric',
            'wantedTotal' => 'required|numeric',
        ]);
        if ($infoCard['wantedTotal'] > $infoCard['income']) {
            return response()->json(['fail' => 'Invalid sum']);
        } else {
            PaymentToCard::create([
                'user_id' => Auth::id(),
                'full_name' => $infoCard['full_name'],
                'bank_name' => $infoCard['bank_name'],
                'card_number_receiver' => $infoCard['card_number_receiver'],
                'inn' => $infoCard['inn'],
                'kpp' => $infoCard['kpp'],
                'bik' => $infoCard['bik'],
                'all_income' => $infoCard['income'],
                'wanted_total' => $infoCard['wantedTotal'],
                'balance' => $infoCard['income'] - $infoCard['wantedTotal'],
            ]);
            return response()->json(['success' => 'Successfully sent request']);
        }
    }

    public function paymentToRequisite(PaymentRequest $request)
    {
        $info = $request->all();
        $request->validate([
            'organization_name' => 'required|string',
            'bank_name' => 'required|string',
            'payment_account' => 'required',
            'correspondent_account' => 'required',
            'ogrn' => 'required',
            'inn' => 'required|numeric',
            'kpp' => 'required|numeric',
            'bik' => 'required|numeric',
            'income' => 'required|numeric',
            'wantedTotal' => 'required|numeric',
        ]);
        if ($info['wantedTotal'] > $info['income']) {
            return response()->json(['fail' => 'Invalid sum']);
        } else {
            PaymentToRequisite::create([
                'user_id' => Auth::id(),
                'organization_name' => $info['organization_name'],
                'bank_name' => $info['bank_name'],
                'payment_account' => $info['payment_account'],
                'correspondent_account' => $info['correspondent_account'],
                'ogrn' => $info['ogrn'],
                'inn' => $info['inn'],
                'kpp' => $info['kpp'],
                'bik' => $info['bik'],
                'all_income' => $info['income'],
                'wanted_total' => $info['wantedTotal'],
                'balance' => $info['income'] - $info['wantedTotal'],
            ]);
            return response()->json(['success' => 'Successfully sent request']);
        }
    }

    public function paymentPercent(){
        $user = Auth::user();
        return response()->json(['percent' => $user['percent']]);
    }
}
