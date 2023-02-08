<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Seance;
use App\Models\SeanceAdvertisements;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \App\Models\User;

class SeanceController extends Controller
{

    public function past()
    {
        // $seances = Seance::where('user_id', auth()->id())
        //     ->where(
        //         function ($query) {
        //             $query->whereDate('day', '<', Carbon::today())
        //                 ->orWhere([
        //                     ['day', '=', Carbon::today()],
        //                     ['start', '<', Carbon::now()->format('H:i')]
        //                 ]);
        //         }
        //     )->get('id', 'start', 'day', 'tickets_amt');
        // $seances = Seance::with('film', 'status', 'user')
        //     ->get();
//dd(123);
        $seances = Seance::where('user_id', Auth::id())
            ->whereDate('day', '<', Carbon::today())
            ->with('film')
            ->get();

        return $seances;
    }

    public function present()
    {
        $films = Film::where('rent_id', 1)->get();
        return $films;
//        $seances = Seance::where('user_id', Auth::id())
//            ->whereDate('day', '=', Carbon::today())
//            ->with('film', 'user')
//            ->get();
//
//        return $seances;
    }

    public function index()
    {
        $seances = Seance::where('user_id', Auth::id())
            ->whereDate('day', '>', Carbon::today()->subDays(1))
            ->with('film', 'user', 'halls')
            ->get();
        // $seances = Seance::where('user_id', auth()->id())->with('film', 'status', 'user')->get();
//        dd($seances[0]['film']['image']);
//        $img = asset('storage/app/'.$seances[0]['film']['image']);
//        dd($img);
        return $seances;
//        return asset(Storage::url($seances));
    }
    public function currentFilmSeance($id){
        $seance = Seance::where('film_id', $id)->with('halls', 'film')->get();
        return response($seance, 200);
    }

    public function myCurrentFilmSeance($id){
        $seance = Seance::where('film_id', $id)->with('halls', 'film')->get();
        return response($seance, 200);
    }

    public function currentFilmSeanceByDay($id, Request $request){
        $data = $request->all();
        $seance = Seance::where('film_id', $id)->whereDate('day', '=', $data['day'])->with('halls', 'film')->get();
        return response($seance, 200);
    }
    public function allTicket($id){
        $currentSeance = Seance::where('id', $id)->with('halls', 'film')->first();
        return response($currentSeance, 200);
    }

    public function broneSeat(Request $request){
        $data = $request->all();
        $bool = true;
        $seance = Seance::where('id', $data['id'])->with('user', 'film')->first();
        if($seance){
            $seance_owner = User::where('id', $seance['user_id'])->first();
            $film_owner = User::where('id', $seance->film['user_id'])->first();
            $ticket_price = $seance['tickets_price'];
            $tickets = json_decode($seance['tickets_amt']);
            if($tickets == null){
                $tickets = [];
            }
            foreach ($data['seats'] as $seat) {
                if(!in_array($seat, $tickets)){
                    $bool = true;
                    array_push($tickets, $seat);
                }else {
                    $bool = false;
                }
            }
            if($bool){
                $all_income = $ticket_price * count($data['seats']);
                $seance_owner_income = $all_income * $seance_owner['percent'] / 100;
                $film_owner_income = $all_income * $film_owner['percent'] / 100;
                $seance_owner_balance = $seance_owner['balance'] + $seance_owner_income;
                $film_owner_balance = $film_owner['balance'] + $film_owner_income;
                User::where('id', $seance['user_id'])->update(['balance' => $seance_owner_balance]);
                User::where('id', $seance->film['user_id'])->update(['balance' => $film_owner_balance]);
            }
            $tickets = array_unique($tickets);
            Seance::where('id', $data['id'])->update(['tickets_amt' => $tickets]);

            return response()->json(['tickets' => $tickets], 200);
        }
        return response()->json('fail', 200);

    }
    public function store(Request $request)
    {
//        dd($request->advertisement_id);
        $validator =  Validator::make($request->all(), [
            'film_id' => 'required',
            'hall_id' =>  'required',
            'day' => 'required',
            'start' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $item = Seance::add([
            'hall_id' => $request->hall_id,
            'day' => $request->day,
            'film_id' => $request->film_id,
            'start' => $request->start,
            'duration_service' => $request->duration_service,
            // 'tickets_amt',
            'tickets_price' => $request->tickets_price,
            'status_id' => 1,
        ]);
        if( json_decode($request->advertisement_id) != []){
            $item->duration_advertising = $request->duration_advertising;
        }else{
            $item->duration_advertising = null;
        }
        $item->user_id = auth()->id();
        $item->is_repeat = false;

        if ($item->save()) {
            foreach (json_decode($request->advertisement_id) as $id){
                SeanceAdvertisements::create([
                    'seance_id' => $item->id,
                    'advertisement_id' => $id,
                ]);
            }
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 500);
    }
    public function show(Request $request, $id)
    {
        $seance = Seance::where('id', $id)->first();
        $film_path = $request->root().'/storage/'.$seance->film['file'];
        if ($request->type == 'ec-test-seance') {

            return response()->json([
                'film' => $seance->film,
                'film_path' => $film_path,
                'start' => rand(0, $seance->film->duration - 1)
            ], 200);
        }

        if ($seance->ended()) {
            return response()->json('Сеанс oкончен', 423);
        }

        if (!$seance->started()) {
            return response()->json(
                "Начало сеанса в  " . $seance->day . ' - ' . $seance->start . '. ('
                    . Carbon::now()->format('Y-m-d - H:i') . ').',
                423
            );
        }
//        dd($seance->film['file']);
        return response()->json([
            'film' => $seance->film,
            'start' => 1
        ], 200);
    }
}
