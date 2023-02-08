<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentToRequisite;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentToRequisiteController extends Controller
{
    public function index()
    {
        $payments = PaymentToRequisite::with('user')->get();

        return view('admin.payment_to_requisite.index', compact('payments'));
    }
//
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
            PaymentToRequisite::where('id', $data['id'])->update(['verified' => $data['value']]);
            $payments = PaymentToRequisite::with('user')->get();
            return redirect()->route('admin.payment_to_requisite.index')->with(['payments' => $payments]);
        }else{
            PaymentToRequisite::where('id', $data['id'])->update(['verified' => $data['value']]);
            $payments = PaymentToRequisite::with('user')->get();
            return redirect()->route('admin.payment_to_requisite.index')->with(['payments' => $payments]);
        }
    }
}
