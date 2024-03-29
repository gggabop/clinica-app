<?php

use App\Http\Controllers\ClientController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/history', [ClientController::class, 'index'])->name('history.index');
    Route::get('/invoice', [ClientController::class, 'index'])->name('invoice.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clientes.create');
    // Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clientes.edit');
    // 
});
