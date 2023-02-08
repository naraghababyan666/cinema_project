<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeanceStatus;
use Illuminate\Http\Request;

class SeanceStatusesAdminController extends Controller
{
    public function index()
    {
        $statuses = SeanceStatus::select('id','title')
            ->orderBy('id')
            ->get();
        return view('admin.seance_statuses.index',compact('statuses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = SeanceStatus::add($request->all());
        $data->save();
        return back()->with('success','Информация добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = SeanceStatus::find($id);
        $data->edit($request->all());
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        $data = SeanceStatus::find($id);
        $data->delete();
        return back()->with('success','Информация удалена');
    }
}
