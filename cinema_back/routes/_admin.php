<?php

use App\Http\Controllers\Admin\AdminAdminController;
use App\Http\Controllers\Admin\CashierAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\CreatorAdminController;
use App\Http\Controllers\Admin\DeliveryTypeAdminController;
use App\Http\Controllers\Admin\DocumentEaisForClientController;
use App\Http\Controllers\Admin\FilmAdminController;
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
use App\Http\Controllers\Admin\SeanceAdminController;
use App\Http\Controllers\Admin\SeanceStatusesAdminController;
use App\Http\Controllers\Admin\SupportAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\UserRoleAdminController;
use App\Http\Controllers\Admin\UserStatusAdminController;
use App\Http\Controllers\Admin\ProjectorsAdminController;
use App\Http\Controllers\Admin\DocumentsController;
use \App\Http\Controllers\Admin\HallsAdminController;
use \App\Http\Controllers\Admin\RequestController;
use \App\Http\Controllers\Admin\ReportController;
use \App\Http\Controllers\Admin\DocumentEaisController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\DocumentsForHoldersController;
use \App\Http\Controllers\Admin\AdvertisementController;
use \App\Http\Controllers\Admin\PaymentToSystemController;
use \App\Http\Controllers\Admin\PaymentToCardController;
use App\Http\Controllers\Admin\PaymentToRequisiteController;
use \App\Http\Controllers\Admin\MakePercentController;

Route::group([
//    'middleware' => ['auth'],
    'prefix' => 'adminex',
    'as' => 'admin.'
], function () { //'middleware' => ['auth','isAdmin'],


    Route::get('/', [IndexAdminController::class,'home'])
        ->name('home');

    Route::resource('genres', GenreAdminController::class)
        ->parameters(['genres'=>'id']);

    Route::resource('projectors', ProjectorsAdminController::class)
        ->parameters(['projectors'=>'id']);

    Route::resource('advertisement', AdvertisementController::class)
        ->parameters(['advertisement'=>'id']);

    Route::resource('request', RequestController::class)
        ->parameters(['request'=>'id']);

    Route::resource('seance-statuses', SeanceStatusesAdminController::class)
        ->parameters(['seance-statuses'=>'id'])
        ->names('seance_statuses');

    Route::resource('users', UserAdminController::class)
        ->parameters(['users'=>'id']);

    Route::resource('films', FilmAdminController::class)
        ->parameters(['films'=>'id']);

    Route::resource('documents', DocumentsController::class)
        ->parameters(['documents'=>'id']);

    Route::resource('documents_for_holders', DocumentsForHoldersController::class)
        ->parameters(['documents_for_holders'=>'id']);

    Route::resource('document_eais', DocumentEaisController::class)
        ->parameters(['document_eais'=>'id']);

    Route::resource('document_eais_for_client', DocumentEaisForClientController::class)
        ->parameters(['document_eais_for_client'=>'id']);

    Route::resource('halls', HallsAdminController::class)
        ->parameters(['halls'=>'id']);

    Route::resource('seances', SeanceAdminController::class)
        ->parameters(['seances'=>'id']);

    Route::resource('payment_to_system', PaymentToSystemController::class)
        ->parameters(['payments'=>'id']);

    Route::resource('payment_to_card', PaymentToCardController::class)
        ->parameters(['payments'=>'id']);

    Route::resource('payment_to_requisite', PaymentToRequisiteController::class)
        ->parameters(['payments'=>'id']);

    Route::resource('make_percent', MakePercentController::class)
        ->parameters(['percent'=>'id']);

    Route::resource('support', SupportAdminController::class);

    Route::post('/documents/change', [DocumentsController::class, 'verifyDocument'])->name('documents.change');
    Route::post('/documents_for_holders/change', [DocumentsForHoldersController::class, 'verifyDocuments'])->name('documents_for_holders.change');
    Route::post('/advertisement/change', [AdvertisementController::class, 'verifyAdvertisement'])->name('advertisement.change');
    Route::post('/payment_to_card/change', [PaymentToCardController::class, 'update'])->name('payment_to_card.change');
    Route::post('/payment_to_system/change', [PaymentToSystemController::class, 'update'])->name('payment_to_system.change');
    Route::post('/payment_to_requisite/change', [PaymentToRequisiteController::class, 'update'])->name('payment_to_requisite.change');
});
