<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreAdminController extends Controller
{
    public function index()
    {
        $genres = Genre::select('id','title')
            ->orderBy('title')
            ->get();
        return view('admin.genres.index',compact('genres'));
    }

    public function create()
    {
        //
    }

    public function store(GenreRequest $request)
    {
        $data = Genre::add($request->all());
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

    public function update(GenreRequest $request, $id)
    {
        $data = Genre::find($id);
        $data->edit($request->all());
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        $data = Genre::find($id);
        $data->delete();
        return back()->with('success','Информация удалена');
    }
}
