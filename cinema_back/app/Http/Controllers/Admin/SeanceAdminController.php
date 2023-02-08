<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FilmService;
use App\Models\Advertising;
use App\Models\Hall;
use App\Models\HallsInDocument;
use App\Models\Seance;
use App\Models\SeanceAdvertisements;
use App\Models\SeanceStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class SeanceAdminController extends Controller
{
    public $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    public function index()
    {
        // $items = Seance::with('film', 'status', 'user')->get();

        // foreach($items as $item){
        //     if($item->film->title == "upload film"){
        //         $item->delete();

        //     }
        // }

        $seances = Seance::with('film', 'status', 'user', 'advertisement')->get();
        return view('admin.seances.index', compact('seances'));
    }

    public function create()
    {
        $halls = HallsInDocument::all();
        $films = $this->filmService->films_active();
        $statuses = SeanceStatus::select('id', 'color', 'title')->get();
        $advertisement = Advertising::where('user_id', null)->get();

        return view('admin.seances.create', compact('films', 'statuses', 'halls', 'advertisement'));
    }

    public function store(Request $request)
    {
        $advertisement_id = [];
        foreach ($request->advertisement_id as $id){
            array_push($advertisement_id, (int) $id);
        }
        $item = Seance::add($request->all());
        $item->user_id = auth()->id();
        $item->film_id = $request->film_id;
        $item->tickets_price = $request->tickets_price;
        $item->isBoolean($request, 'is_repeat');
        $item->save();

        foreach ($advertisement_id as $advertising_id){
            SeanceAdvertisements::create([
                'seance_id' => $item->id,
                'advertisement_id' => $advertising_id,
            ]);
        }
//        dd($item);

        return redirect()->route('admin.seances.index')->with('success', 'Информация добавлена');
    }

    public function edit($id)
    {
        $halls = HallsInDocument::all();
        $item = Seance::find($id);
        $films = $this->filmService->films_active();
//        $seanceAdvertisements = SeanceAdvertisements::where('seance_id', $item['id'])->with('advertisings')->get();
//        dd($seanceAdvertisements);
//        $advertisement = Advertising::where('user_id', null)->get();
        $advertisements = SeanceAdvertisements::where('seance_id', $item['id'])->with('advertisings')->get();
        $statuses = SeanceStatus::select('id', 'color', 'title')
            ->get();
        return view('admin.seances.edit', compact('item', 'films', 'statuses', 'halls', 'advertisements'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Seance::find($id);
        if(array_key_exists('advertisement_id', $data)){
            $lastAdvertisement_id = $data['advertisement_id'];
            $advertisements_in_db = SeanceAdvertisements::where('seance_id', $item->id)->delete();
            foreach ($lastAdvertisement_id as $requestId){
                SeanceAdvertisements::create([
                    'seance_id' => $item->id,
                    'advertisement_id' => $requestId
                ]);
            }
        }else{
            SeanceAdvertisements::where('seance_id', $item->id)->delete();
        }

        $item->edit($request->all());
        $item->isBoolean($request, 'is_repeat');
        $item->save();
        return redirect()->route('admin.seances.index')->with('success', 'Информация изменена');
    }

    public function destroy($id)
    {
        $item = Seance::find($id);
        $item->delete();
        return redirect()->route('admin.seances.index')->with('success', 'Информация изменена');

    }
}
