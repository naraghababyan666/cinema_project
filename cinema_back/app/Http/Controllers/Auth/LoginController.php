<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\UserInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use \Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use \Illuminate\Auth\Authenticatable;
//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware(['guest', 'cors'])->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('adminex/seances')
                ->withSuccess('You have Successfully logged in');
        }else{
            dd(2);
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

//        if(Auth::attempt($request->only(['email', 'password']))){
////            Session::put('logged', Auth::id());
//            return redirect()->route('admin.home')->withErrors(['user' => Auth::user()]);
//        }else{
//                return redirect()->route('login')->with(['error' => 'These credentials do not match our records.']);
//            }


//        $user = User::where('email', $request->all()['email'])->first();
//        if($user){
//            if(Hash::check($request->all()['password'] , $user->password)){
//                Auth::login($user);
//                Session::put('logged', Auth::id());
//                return redirect()->route('login')->withErrors(['user' => Auth::user()]);
//
//            }
//            else{
//                return redirect()->route('login')->with(['error' => 'These credentials do not match our records.']);
//            }
//        }else{
//            return redirect()->route('login')->with(['error' => 'These credentials do not match our records.']);
//        }
//        dd($authenticate);
//        if($authenticate)
//        {
//            $request->session()->regenerate();
//            $user = User::where('email', $request->all()['email'])->first();
//            Auth::login($user);
//            $this->clearLoginAttempts($request);
//
//            foreach ([1=>'user',2=>'cashier',3=>'operator',4=>'creator',5=>'admin', 6=>'cinema'] as $role=>$route)
//            {
//                if($user->role_id == $role)
//                {
//                    return redirect()->route($route.'.home');
//                }
//            }
//
////            if($request->route == 'home')
////            {
////                return redirect()->intended(route('home'));
////            }
////            else
////            {
////                return redirect()->intended(url()->previous());
////            }
//        }
//        $this->incrementLoginAttempts($request);
//
//        throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
//
//        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {
        $id = Session::get('logged');
        $user = User::where('id', $id)->first();
        Auth::login($user);
        Auth::logout();
        Session::forget('logged');
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard();
    }

}
