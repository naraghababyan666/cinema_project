<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexCreatorController extends Controller
{
    public function home()
    {
        return view('creator.index');
    }
}
