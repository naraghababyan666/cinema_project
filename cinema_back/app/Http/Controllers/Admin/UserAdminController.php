<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Mail\NewUser;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserAdminController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
//        $users = $this->userService->get_users();
        $users = User::with('role')->get();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $users = User::with('role')->get();
        return view('admin.users.credit', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'role_id' => 'required|numeric',
            'country_code' => 'required|numeric',
            'phone' => 'required|numeric|unique:users',
        ]);

        $item = User::add($request->all());
        $item->open_password = Str::random(10);
        $item->password = Hash::make($item->open_password);
        $item->remember_token = Str::random(40);
        $item->isBoolean($request,'is_active');
        $item->save();

        Mail::to($item->email)->send(new NewUser($item));

        $item->open_password = null;
        $item->save();

        return redirect()->route('admin.users.index')->with('success','Информация добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = User::where('id', $id)->with('role')->first();
        $roles = UserRole::all();
        return view('admin.users.edit', compact('item', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required|numeric',
            'percent' => 'required|numeric',
            'country_code' => 'required|numeric',
            'phone' => 'required|numeric',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->percent = $request->percent;
        $user->country_code = $request->country_code;
        $user->phone = $request->phone;
        $user->isBoolean($request,'is_active');
        $user->password = Hash::make($user->open_password);
        $user->save();

        return redirect()->route('admin.users.index')->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();

        return redirect()->route('admin.users.index')->with('success','Информация удалена');
    }
}
