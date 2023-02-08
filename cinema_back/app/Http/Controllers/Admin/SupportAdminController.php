<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FilmService;
use App\Models\Hall;
use App\Models\HallsInDocument;
use App\Models\Seance;
use App\Models\SeanceStatus;
use Illuminate\Http\Request;

class SupportAdminController extends Controller
{

    public function index()
    {
        return view('admin.support.index');
    }
}
