<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\BarangKeluarController;
use App\Http\Controllers\Admin\LaporanController;


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

        // ======================
        // Dashboard
        // ======================
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // ======================
        // Manajemen User
        // ======================
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::post('/users/{id}/approve', [UserController::class, 'approve'])
            ->name('users.approve');

        Route::post('/users/{id}/reject', [UserController::class, 'reject'])
            ->name('users.reject');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');


        // ======================
        // MASTER DATA
        // ======================

        // Produk
        Route::resource('products', ProductController::class);

       //kategori

        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories.index');
        
        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::put('/categories/{id}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

        // Supplier
        Route::resource('suppliers', SupplierController::class);

        // ======================
        // MONITORING
        // ======================

        Route::middleware(['role:admin'])->group(function () {
        Route::get('/barang-masuk', [BarangMasukController::class, 'index']);
        });

        Route::middleware(['role:admin|supervisor'])->group(function () {
        Route::get('/barang-keluar', [BarangKeluarController::class, 'index']);
        });

        Route::get('/barang-masuk', [BarangMasukController::class, 'index'])
            ->name('barang-masuk.index');

        Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])
            ->name('barang-keluar.index');
        

        Route::get('/stok', [ProductController::class, 'stock'])
        ->name('stok.index');


        // ======================
        // LAPORAN
        // ======================

        Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');


       

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

 Route::post('/barang-masuk/{id}/approve', [BarangMasukController::class, 'approve'])
        ->middleware('role:supervisor');


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
