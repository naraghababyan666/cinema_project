<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentToSystem;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentToSystemController extends Controller
{
    public function index()
    {
        $payments = PaymentToSystem::with('user')->get();

        return view('admin.payment_to_system.index', compact('payments'));
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
            PaymentToSystem::where('id', $data['id'])->update(['verified' => $data['value']]);
            $payments = PaymentToSystem::with('user')->get();
            return redirect()->route('admin.payment_to_system.index')->with(['payments' => $payments]);
        }else{
            PaymentToSystem::where('id', $data['id'])->update(['verified' => $data['value']]);
            $payments = PaymentToSystem::with('user')->get();
            return redirect()->route('admin.payment_to_system.index')->with(['payments' => $payments]);
        }
    }
}
