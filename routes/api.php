<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ReportController;
use App\Http\Controllers\Reports\ReportLocalController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('/verify_reports', [ReportController::class, 'verify']);
    Route::get('/verify_reports', [ReportController::class, 'verify']);
    Route::post('/save_reports', [ReportLocalController::class, 'save']);
    Route::get('/load_reports/{ikul}/{name_report}', [ReportLocalController::class, 'load']);

Route::post('/send_subscribe_reports', [ReportController::class, 'subscribeReports'])->name('subscribe_reports');
