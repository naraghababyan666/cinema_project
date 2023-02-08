<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifiedDocuments
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->document_verified == 2){
            return $next($request);
//            return response()->json('verifiedDocuments');
        }else{
            return response()->json(['NotVerifiedDocuments' => 'Your are not verified user']);
        }

    }
}
