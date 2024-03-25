<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/itineraries', [ItineraryController::class, 'index']);
Route::post('/itineraries', [ItineraryController::class, 'store']);
Route::get('/itineraries/{id}', [ItineraryController::class, 'show']);
Route::put('/itineraries/{id}', [ItineraryController::class, 'update']);
Route::delete('/itineraries/{id}', [ItineraryController::class, 'destroy']);

Route::get('/destinations', [DestinationController::class, 'index']);
Route::post('/destinations', [DestinationController::class, 'store']);
Route::get('/destinations/{id}', [DestinationController::class, 'show']);
Route::put('/destinations/{id}', [DestinationController::class, 'update']);
Route::delete('/destinations/{id}', [DestinationController::class, 'destroy']);

Route::get('/visits', [VisitController::class, 'index']);
Route::post('/visits', [VisitController::class, 'store']);
Route::get('/visits/{id}', [VisitController::class, 'show']);
Route::put('/visits/{id}', [VisitController::class, 'update']);
Route::delete('/visits/{id}', [VisitController::class, 'destroy']);

