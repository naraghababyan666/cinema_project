<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexOperatorController extends Controller
{
    public function home()
    {
        return view('operator.index');
    }
}
