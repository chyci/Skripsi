<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugEntryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Middleware\UserRole;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/create', [DrugEntryController::class, 'create'])->name('drugentry.create');
    Route::post('/store', [DrugEntryController::class, 'store'])->name('drugentry.store');
    Route::get('/edit/{id}', [DrugEntryController::class, 'edit'])->name('drugentry.edit');
    Route::put('/update/{id}', [DrugEntryController::class, 'update'])->name('drugentry.update');
    Route::get('/destroy/{id}', [DrugEntryController::class, 'destroy'])->name('drugentry.destroy');
});
Route::prefix('drug')->group(function () {
    Route::get('/', [DrugController::class, 'index'])->name('drug');
    Route::get('/create', [DrugController::class, 'create'])->name('drug.create');
    Route::post('/store', [DrugController::class, 'store'])->name('drug.store');
    Route::get('/edit/{id}', [DrugController::class, 'edit'])->name('drug.edit');
    Route::put('/update/{id}', [DrugController::class, 'update'])->name('drug.update');
    Route::get('/destroy/{id}', [DrugController::class, 'destroy'])->name('drug.destroy');
});
Route::prefix('visit')->group(function () {
    Route::get('/', [VisitController::class, 'index'])->name('visit.index');
    Route::get('/create', [VisitController::class, 'create'])->name('visit.create');
    Route::post('/store', [VisitController::class, 'store'])->name('visit.store');
    Route::get('/edit/{id}', [VisitController::class, 'edit'])->name('visit.edit');
    Route::put('/update/{id}', [VisitController::class, 'update'])->name('visit.update');
    Route::get('/show/{id}', [VisitController::class, 'show'])->name('visit.show');
    Route::get('/destroy/{id}', [VisitController::class, 'destroy'])->name('visit.destroy');
});
Route::prefix('user')->middleware(UserRole::class)->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
});
Route::prefix('patienthistory')->group(function () {
    Route::get('/', [PatientHistoryController::class, 'index'])->name('patienthistory.index');
    Route::get('/show/{id}', [PatientHistoryController::class, 'show'])->name('patienthistory.show');
});