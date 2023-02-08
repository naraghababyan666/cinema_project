<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentEaisForClient;
use App\Models\HallsInDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentEaisForClientController extends Controller
{
    public function index()
    {
        $documents = DocumentEaisForClient::with('user', 'halls')->get();
//        dd(json_decode($documents[0]['person_photo']));
        return view('admin.document_eais_for_client.index', compact('documents'));
    }
}
