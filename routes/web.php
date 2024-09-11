<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsesController;

// Route::middleware(['auth'])->group(function () {
//     Route::resource('things', ThingController::class);
//     Route::resource('places', PlaceController::class);
//     Route::resource('users', UserController::class);
// });

Auth::routes();

Route::get('/', function() {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/things/report')->group(function() {
    Route::get('/all',[ThingController::class, 'all'])->name('things.report.all')->middleware('auth');
    Route::get('/repair',[ThingController::class, 'repair'])->name('things.report.repair')->middleware('auth');
    Route::get('/work',[ThingController::class, 'work'])->name('things.report.work')->middleware('auth');
    Route::get('/used',[ThingController::class, 'used'])->name('things.report.used')->middleware('auth');
});

Route::resource('/things', ThingController::class)->middleware('auth');

Route::get('/things/{thing_id}/uses',[UsesController::class, 'create'])->name('things.uses')->middleware('auth');
Route::post('/uses',[UsesController::class, 'store'])->name('uses.store')->middleware('auth');

Route::resource('/places', PlaceController::class)->middleware('auth');
