<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ReportController;
use App\Http\Controllers\Reports\SaveReportController;
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
Route::post('/export_reports',[ReportController::class,'export']);
Route::get('/export_reports',[ReportController::class,'export']);
Route::post('/save_reports',[SaveReportController::class,'save']);
Route::get('/save_reports',[SaveReportController::class,'save']);
