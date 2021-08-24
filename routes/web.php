<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\ProfileController;



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/profile/edit', [ProfileController::class, 'getEdit'])
    ->middleware('auth')
    ->name('profile.edit');

Route::post('/profile/edit', [ProfileController::class, 'postEdit'])
    ->middleware('auth')
    ->name('profile.edit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

