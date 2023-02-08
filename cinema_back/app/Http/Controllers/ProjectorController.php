<?php

namespace App\Http\Controllers;

use App\Models\Projector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use const http\Client\Curl\AUTH_ANY;

class ProjectorController extends Controller
{
    public function show(){
        $projectors = Projector::orderBy('id', 'DESC')->get();
        return response()->json($projectors);
    }
    public function addProjector(Request $request){
        $id=Auth::id();

        Projector::create([
            'user_id' => $id,
            'projector_name' => $request->all()['projector_name'],
            'projector_number' => $request->all()['projector_number'],
        ]);
        return response()->json('ok', 200);
//        dd($request);
    }
    public function deleteProjector(Request $request){
        $id = $request->all()['data']['id'];
//        $current_projector = Projector::where('id', $id)->first();
        DB::table('projectors')->delete($id);
        return response()->json(['success' => 'successfully deleted']);
    }
}
