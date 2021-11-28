<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\ProfileController;
use \Illuminate\Auth\Middleware\Authorize;
use App\Services\CryptoProSign\CryptoProSign;
use App\Http\Requests\Auth;
use App\Models\User;
//use App\Http\Controllers\Reports\SaveReportController;
use App\Http\Controllers\Reports\ReportCreateController;
use App\Http\Controllers\Reports\ReportLocalController;
use App\Http\Controllers\ChooseView;
Route::get('/',[ChooseView::class, 'change'])->middleware('auth')->name('dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'getEdit'])
        ->middleware('auth')
        ->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'postEdit'])
        ->middleware('auth')
        ->name('profile.edit');
//ССЫЛКИ ПОЛЬЗОВАТЕЛЕЙ
Route::group(['middleware' => ['role:user|master_user']], function () {
//ОТЧЁТЫ
    Route::post('/reports_create', [ReportCreateController::class,'create']);
    Route::post('/reports_local_create', [ReportCreateController::class,'createLocal']);
    Route::get('/create_monthly',[ReportLocalController::class,'show'])->name('create_monthly');
    //Route::get('/create_monthly',function (){return view('user_tabs.reports.create_monthly');})->name('create_monthly');
    Route::get('/monthly', function () {return view('user_tabs.reports.monthly.monthly');})->middleware(['auth'])->name('monthly');
//  Route::post('/monthly', [CryptoProSign::class, 'sign'])->middleware(['auth'])->name('monthly');;
    Route::get('/quartely', function () {return view('user_tabs.reports.quarterly');})->middleware(['auth'])->name('quarterly');
//ПИСЬМА
    Route::get('/letters', function () {return view('user_tabs.letters.accompanying_later');})->middleware(['auth'])->name('accompanying_later');
});
//ССЫЛКИ АДМИНИСТРАТОРА
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
require __DIR__.'/auth.php';

