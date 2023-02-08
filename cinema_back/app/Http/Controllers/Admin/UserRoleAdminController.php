<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Http\Request;

class UserRoleAdminController extends Controller
{
    public function index()
    {
        $roles = UserRole::select('id','title')
            ->orderBy('id')
            ->get();
        return view('admin.user_roles.index',compact('roles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = UserRole::add($request->all());
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
        $data = UserRole::find($id);
        $data->edit($request->all());
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        $data = UserRole::find($id);
        $data->delete();
        return back()->with('success','Информация удалена');
    }
}
