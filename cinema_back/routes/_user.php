<?php

use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\IndexController;

Route::group(['middleware' => 'auth','prefix' => 'user', 'as' => 'user.'], function () {

//    Route::get('/', [IndexController::class,'index'])->name('index');
//    Route::post('/personal-data', [IndexController::class,'personalData'])->name('personalData');
//
//    Route::group(['middleware' => 'IsVerifiedEmail'], function () {
//        Route::resource('/addresses', AddressController::class)
//            ->parameters(['addresses'=>'id']);
//        Route::get('/orders', [IndexController::class,'orders'])->name('orders');
//
//        Route::get('/messages', [IndexController::class,'messages'])->name('messages');
//        Route::post('/messages-send', [IndexController::class,'messageSend'])->name('messageSend');
//    });
});
