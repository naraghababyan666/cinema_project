<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
//    protected function redirectTo($request)
//    {
//        if(!Session::exists('logged')){
//            return redirect()->route('login');
//        }
//    }
    public function handle($request, Closure $next, ...$guard)
    {
//        if(Session::exists('logged')){
//            return $next($request);
//        }
//        dd(Auth::check());
        if (\Illuminate\Support\Facades\Auth::guard($guard)->check()) {
            return redirect('/');
        }
        return $next($request);
//        if(Auth::user()->role_id == 5){
//            return $next($request);
//        }
//        else{
//            return redirect()->route('login');
//        }

    }


}
