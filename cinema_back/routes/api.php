<?php

use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\SeanceController;
use App\Http\Controllers\Api\JwtAuthController;
use \App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ForHoldersController;
use \App\Http\Controllers\ChatController;
use \App\Http\Controllers\HomeController;
use Tymon\JWTAuth\Facades\JWTAuth;
use \App\Http\Controllers\Api\PaymentController;

Route::middleware('api')->group(function () {

    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
//        Route::post('/test', function () {
//            return JWTAuth::parseToken()->authenticate();
//        });

        Route::middleware('holder')->post('/cinema/forHolders/checkRole', [HallController::class, 'checkHolder']);
        Route::middleware('cinema')->post('/cinema/for-dashboard/documentCheck', [HallController::class, 'checkCinema']);

        Route::post('/upload-docs', [HallController::class, 'uploadData']);
        Route::post('/get-my-document', [HallController::class, 'getMyDocument']);
        Route::post('/cinema/forHolders/check', [HallController::class, 'checkHolderForm']);

        Route::post('/upload-eais-docs', [HallController::class, 'uploadEaisData']);
        Route::post('/upload-eais-docs-for-client', [HallController::class, 'uploadEaisDataForClient']);
        Route::post('/get-persons', [HallController::class, 'getPersons']);
        Route::post('/get-passport', [HallController::class, 'getPassport']);
        Route::post('/get-halls', [HallController::class, 'getHalls']);
        Route::post('/delete-persons', [HallController::class, 'deletePerson']);
        Route::post('/add-advertisement', [HallController::class, 'addAdvertisement']);
        Route::post('/delete-advertisement', [HallController::class, 'deleteAdvertisement']);
        Route::post('/my-advertisement', [HallController::class, 'myAdvertisement']);
        Route::post('/get-advertisements', [HallController::class, 'getAdvertisement']);
        Route::post('/checkDocuments', [HallController::class, 'checkDocuments']);
        Route::post('/cinema/forHolders/checkDocuments', [HallController::class, 'checkDocumentsForHolders']);
//        Route::post('/checkRole', [FilmController::class, 'checkRoleFunction']);


        Route::post('/forHolders/today-cinema', [SeanceController::class, 'present']);

        Route::post('/forHolders/carousel', [ForHoldersController::class, 'getMyFilms']);
        Route::post('/cinema/forHolders/documents/send', [ForHoldersController::class, 'sendRequest']);

        Route::post('/cinema/dashboard/show',       [ProjectorController::class, 'show']);
        Route::put('/cinema/dashboard',        [ProjectorController::class, 'addProjector']);
        Route::post('/cinema/dashboard/delete',     [ProjectorController::class, 'deleteProjector']);

        Route::post('/cinema/for-halls/documentCheck', [HallController::class, 'checkDocuments']);

        Route::post('/logout',           [JwtAuthController::class,     'logout'])->name('api.logout');

        Route::post('/seances',        [SeanceController::class, 'index'])->name('api.seance.index');
        Route::post('/seances/store',  [SeanceController::class, 'store'])->name('api.seance.store');
        Route::post('/seances/{id}',   [SeanceController::class, 'show'])->name('api.seance.show');

        Route::post('/halls',  [HallController::class,        'index'])->name('api.hall.index');
        Route::post('/advertisements',  [HallController::class,        'getMyAdvertisements']);
        Route::post('/genres', [GenreController::class,       'index'])->name('api.genre.index');

        Route::post('/films',          [FilmController::class, 'index'])->name('api.film.index');
        Route::post('/my-films',          [FilmController::class, 'myFilms']);
        Route::post('/films/store',    [FilmController::class, 'store'])->name('api.film.store');
        Route::post('/films/{id}',     [FilmController::class, 'show']) ->name('api.film.show');
        Route::post('/films-for-finance',          [FilmController::class, 'getMyFilmsForFinance']);
        Route::post('/get-my-seances',          [FilmController::class, 'getMySeances']);
        Route::post('/cinema/forHolders/my-film/set-rating',     [FilmController::class, 'setRating']);

        Route::post('/filmForCounter/{id}',     [FilmController::class, 'filmForCounter']);

        Route::post('/past-seances',   [SeanceController::class, 'past']);
        Route::post('/present-seances',[SeanceController::class, 'index']);
        Route::middleware('verified.documents.for.holders')->post('/cinema/forHolders', [FilmController::class, 'redirect']);
        Route::post('/cinema/forHolders/rating', [FilmController::class, 'redirect']);
        Route::post('/cinema/forHolders/today-cinema', [FilmController::class, 'redirect']);
        Route::post('/cinema/forHolders/my-films', [FilmController::class, 'redirect']);
        Route::post('/cinema/forHolders/upload-new', [FilmController::class, 'redirect']);
        Route::post('/cinema/forHolders/documents', [FilmController::class, 'redirect']);

//        Route::middleware('verified.documents')->post('/cinema/forHolders/rating', [FilmController::class, 'redirect']);
//        Route::middleware('verified.documents')->post('/cinema/forHolders/today-cinema', [FilmController::class, 'redirect']);
//        Route::middleware('verified.documents')->post('/cinema/forHolders/my-films', [FilmController::class, 'redirect']);
//        Route::middleware('verified.documents')->post('/cinema/forHolders/upload-new', [FilmController::class, 'redirect']);
//        Route::middleware('verified.documents')->post('/cinema/forHolders/documents', [FilmController::class, 'redirect']);

        Route::post('/payment/payment-to-system', [PaymentController::class, 'paymentToSystem']);
        Route::post('/payment/payment-to-card', [PaymentController::class, 'paymentToCard']);
        Route::post('/payment/payment-to-requisite', [PaymentController::class, 'paymentToRequisite']);
        Route::post('/payment/get-percent', [PaymentController::class, 'paymentPercent']);

    });
});

Route::post('/register',             [JwtAuthController::class,     'register'])->name('api.register');
Route::post('/auth/step-1',          [JwtAuthController::class,     'sendCode'])->name('api.sendcode');
Route::post('/auth/step-2',          [JwtAuthController::class,     'login'])->name('api.login');
Route::post('/seance/{id}',[SeanceController::class, 'currentFilmSeance']);
Route::post('/mySeance/{id}',[SeanceController::class, 'myCurrentFilmSeance']);
Route::post('/seanceByDay/{id}',[SeanceController::class, 'currentFilmSeanceByDay']);
Route::post('/seance-all-tickets/{id}',[SeanceController::class, 'allTicket']);
Route::post('/seance-all-tickets/brone-seat/{id}',[SeanceController::class, 'broneSeat']);
Route::get('/chat/rooms', [ChatController::class, 'rooms']);
Route::get('/chat/room/{roomId}/messages', [ChatController::class, 'messages']);
Route::post('/chat/room/{roomId}/message', [ChatController::class, 'newMessage']);

Route::post('/get-films', [HallController::class, 'getFilms']);
Route::post('/films/{id}',     [FilmController::class, 'show']) ->name('api.film.show');
//Route::post('/check-film-owner/{id}',     [FilmController::class, 'checkFilmOwner']);
//Route::post('/upload-docs', [HallController::class, 'uploadData']);

Route::post('/getIp', [HomeController::class, 'getIp']);

Route::post('/support', [ChatController::class, 'newMessage']);


