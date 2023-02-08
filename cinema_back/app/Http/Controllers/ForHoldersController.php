<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForHoldersController extends Controller
{
    public function getMyFilms(){
        $user_id = Auth::user()->id;
        $user_film = Film::all()->where('user_id', $user_id);
        if(count($user_film) == 0){
            return response()->json(['hasNot']);
        }else{
            return response()->json(['has']);
        }
    }

    public function sendRequest(Request $request){
        $documents = $request->all();
//        if($documents['tab'] == 'Delete'){
//            $k = [];
//            foreach($documents['films'] as $a){
//                array_push($k, array_values($a));
//            }
//            DocumentRequest::create([
//                'user_email' => $documents['email'],
//                'section' => $documents['tab'],
//                'time' => Carbon::now()->toDateTimeString(),
//                'films' => json_encode($k),
//            ]);
//        }
        $email = array_key_exists('email', $documents);
        if($email){
            DocumentRequest::create([
                'user_email' => $documents['email'],
                'films' => json_encode($documents['films']),
                'section' => $documents['tab'],
                'time' => Carbon::now()->toDateTimeString()
            ]);
            return response()->json(['success' => 'Successfully send request'], 201 );
        }else{
            DocumentRequest::create([
                'user_email' =>Auth::user()->email,
                'films' => json_encode($documents['films']),
                'section' => $documents['tab'],
                'time' => Carbon::now()->toDateTimeString()
            ]);
            return response()->json(['success' => 'Successfully send request'], 201 );
        }
    }
}
