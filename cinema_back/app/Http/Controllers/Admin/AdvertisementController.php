<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\HallsInDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function index()
    {
        $admin_advertisements = Advertising::where('user_id', null)->with('hall')->get();
        $user_advertisements = Advertising::whereNotNull('user_id')->with('user', 'hall')->get();
        $advertisements = Advertising::with('user', 'hall')->get();
        return view('admin.advertisement.index', compact('user_advertisements', 'admin_advertisements'));
    }

    public function verifyAdvertisement(Request $request){
        $data = $request->all();
        Advertising::where('id', $data['id'])->update([
            'verified' => $data['value']
        ]);
        $admin_advertisements = Advertising::where('user_id', null)->with('hall')->get();
        $user_advertisements = Advertising::whereNotNull('user_id')->with('user', 'hall')->get();
        return view('admin.advertisement.index', compact('user_advertisements', 'admin_advertisements'));
    }

    public function create(){
        return view('admin.advertisement.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $file = $request->file();
        if($file){
            $filename = Str::random(10) . '_' . $data['file']->getClientOriginalName();
            $data['file']->move(public_path() . '/storage/videos/', $filename);
        }


        Advertising::create([
            'title' => $data['title'],
            'duration' => $data['duration'],
            'file' => &$filename,
        ]);
        return redirect()->route('admin.advertisement.index')->with('success', 'Информация добавлена');

    }
}
