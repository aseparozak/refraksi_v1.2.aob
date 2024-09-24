<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route resource untuk PatientController
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('patients', PatientController::class);
    Route::resource('ukurans', UkuranController::class);
    // Route::post('/ukurans', [UkuranController::class, 'store'])->name('ukurans.store');
    // Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
});

require __DIR__.'/auth.php';

Route::get('/ukurans/{ukuran}/print', [UkuranController::class, 'print'])->name('ukurans.print');
