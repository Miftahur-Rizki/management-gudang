<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});


// ======================
// AUTH (login, register)
// ======================
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ======================
// ADMIN AREA
// ======================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Manajemen User
        Route::get('/users', [UserController::class, 'index'])
            ->name('users');

        Route::post('/users/{id}/approve', [UserController::class, 'approve'])
            ->name('users.approve');

        Route::post('/users/{id}/reject', [UserController::class, 'reject'])
            ->name('users.reject');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories');

        //kategori
        
        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::put('/categories/{id}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

    });


// ======================
// PETUGAS
// ======================
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::view('/petugas/dashboard', 'petugas.dashboard')
        ->name('petugas.dashboard');
});


// ======================
// SUPERVISOR
// ======================
Route::middleware(['auth', 'role:supervisor'])->group(function () {
    Route::view('/supervisor/dashboard', 'supervisor.dashboard')
        ->name('supervisor.dashboard');
});


// ======================
// PROFILE (semua user login)
// ======================
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});
