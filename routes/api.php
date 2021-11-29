<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ReportController;
use App\Http\Controllers\Reports\ReportLocalController;
use App\Http\Controllers\Reports\ReportCreateController;
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
Route::get('/api_test',[ReportCreateController::class,'create']);



Route::post('/export_reports',[ReportController::class,'export']);
Route::get('/export_reports',[ReportController::class,'export']);
Route::post('/save_reports',[ReportLocalController::class,'save']);
Route::get('/load_reports/{ikul}/{name_report}',[ReportLocalController::class,'load']);
