<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BarberController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/accounts/create', [AuthController::class, 'showRegister'])->name('accounts.create');
    Route::post('/accounts', [AuthController::class, 'register'])->name('accounts.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::post('/payments/{payment}/verify', [PaymentController::class, 'verify'])->name('payments.verify');
    Route::patch('/barbers/{barber}/status', [BarberController::class, 'updateStatus'])->name('barbers.status');
});
