<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Services\FilmService;
use App\Models\Seance;
use App\Models\SeanceStatus;
use Illuminate\Http\Request;

class SeanceOperatorController extends Controller
{
    public $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    public function index()
    {
        $seances = Seance::with('film','status')
            ->get();
        return view('operator.seances.index',compact('seances'));
    }

    public function create()
    {
        $films = $this->filmService->films_active();
        $statuses = SeanceStatus::select('id','color','title')
            ->get();
        return view('operator.seances.credit',compact('films','statuses'));
    }

    public function store(Request $request)
    {
        $item = Seance::add($request->all());
        $item->user_id = auth()->id();
        $item->isBoolean($request,'is_repeat');
        $item->save();
        return redirect()->route('operator.seances.index')->with('success','Информация добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Seance::find($id);
        $films = $this->filmService->films_active();
        $statuses = SeanceStatus::select('id','color','title')
            ->get();
        return view('operator.seances.credit',compact('item','films','statuses'));
    }

    public function update(Request $request, $id)
    {
        $item = Seance::find($id);
        $item->edit($request->all());
        $item->user_id = 1;
        $item->isBoolean($request,'is_repeat');
        $item->save();
        return redirect()->route('operator.seances.index')->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
