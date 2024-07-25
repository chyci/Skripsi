<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugEntryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('patient')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patient');
    Route::get('/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/store', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/edit/{id}', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/update/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::get('/destroy/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
});
Route::prefix('drugentry')->group(function () {
    Route::get('/', [DrugEntryController::class, 'index'])->name('drugentry');
});
Route::prefix('drug')->group(function () {
    Route::get('/', [DrugController::class, 'index'])->name('drug.index');
});
Route::prefix('visit')->group(function () {
    Route::get('/', [VisitController::class, 'index'])->name('visit.index');
});
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
});