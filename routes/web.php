<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugEntryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('patient')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patient.index');
});
Route::prefix('drugentry')->group(function () {
    Route::get('/', [DrugEntryController::class, 'index'])->name('drugentry.index');
});
Route::prefix('drug')->group(function () {
    Route::get('/', [DrugController::class, 'index'])->name('drug.index');
});
Route::prefix('visit')->group(function () {
    Route::get('/', [VisitController::class, 'index'])->name('visit.index');
});
Route::prefix('user')->group(function () {
    Route::get('/', [UserCotroller::class, 'index'])->name('user.index');
});