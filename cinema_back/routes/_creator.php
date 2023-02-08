<?php

use App\Http\Controllers\Admin\AdminAdminController;
use App\Http\Controllers\Admin\CashierAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\CreatorAdminController;
use App\Http\Controllers\Admin\DeliveryTypeAdminController;
use App\Http\Controllers\Admin\GenreAdminController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LocationAdminController;
use App\Http\Controllers\Admin\MessageAdminController;
use App\Http\Controllers\Admin\OperatorAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\OrderStatusAdminController;
use App\Http\Controllers\Admin\PayTypeAdminController;
use App\Http\Controllers\Admin\PermissionAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\ProductGroupAdminController;
use App\Http\Controllers\Admin\ProductStatusAdminController;
use App\Http\Controllers\Admin\QuestionAdminController;
use App\Http\Controllers\Admin\RoleAdminController;
use App\Http\Controllers\Admin\SeanceStatusesAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\UserRoleAdminController;
use App\Http\Controllers\Admin\UserStatusAdminController;
use App\Http\Controllers\Cashier\IndexСashierController;
use App\Http\Controllers\Creator\FilmCreatorController;
use App\Http\Controllers\Creator\IndexCreatorController;
use App\Http\Controllers\Operator\IndexOperatorController;

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'creator',
    'as' => 'creator.'
], function () { //'middleware' => ['auth','isAdmin'],


    Route::get('', [IndexCreatorController::class,'home'])
        ->name('home');

    Route::resource('films', FilmCreatorController::class)
        ->parameters(['films'=>'id']);

        
});
