<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexCashierController extends Controller
{
    public function home()
    {
        return view('cashier.index');
    }
}
