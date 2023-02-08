<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        $requests = DocumentRequest::all();
//        $films = [];
//
//        foreach ($requests as $request){
//            array_push($films, json_decode($request->films));
//        }
        return view('admin.request.index', compact(['requests']));
    }
}
