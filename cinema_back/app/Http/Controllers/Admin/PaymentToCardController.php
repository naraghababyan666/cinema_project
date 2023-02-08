<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentToCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentToCardController extends Controller
{
    public function index()
    {
        $payments = PaymentToCard::with('user')->get();

        return view('admin.payment_to_card.index', compact('payments'));
    }

    public function update(Request $request){
        $data = $request->all();
        if($data['value'] == 1){
            $user = User::where('id', $data['user_id'])->first();
            if($user){
                $balance = $user->balance - $data['wanted_total'];
                if($balance >= 0){
                    $user->balance = $balance;
                }
               $user->save();
            }
            PaymentToCard::where('id', $data['id'])->update(['verified' => $data['value']]);
            $payments = PaymentToCard::with('user')->get();
            return redirect()->route('admin.payment_to_card.index')->with(['payments' => $payments]);
        }else{
            PaymentToCard::where('id', $data['id'])->update(['verified' => $data['value']]);
            $payments = PaymentToCard::with('user')->get();
            return redirect()->route('admin.payment_to_card.index')->with(['payments' => $payments]);
        }



    }
}
