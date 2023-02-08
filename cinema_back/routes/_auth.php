<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Pages\OrderController;

//Route::get('verify/{token?}', [VerifyEmailController::class,'emailVerify'])
//    ->name('emailVerify');
//Route::post('verify', [VerifyEmailController::class,'emailVerifyPost'])
//    ->name('emailVerifyPost');
//
//Route::get('/login/{service}', [LoginController::class,'redirectToProvider'])->name('social');
//Route::get('/login/{service}/callback', [LoginController::class,'handleProviderCallback']);

Route::group(['middleware' => ['auth','verified'],], function () {

});
