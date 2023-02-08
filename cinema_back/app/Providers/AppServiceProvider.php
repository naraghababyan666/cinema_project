<?php

namespace App\Providers;

use App\Models\UserRole;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

//    public function boot()
//    {
//        $roles = UserRole::select('id','slug','title','titles','title_r')
//            ->get();
//
//        View::share(['roles'=>$roles]);
//    }
}
