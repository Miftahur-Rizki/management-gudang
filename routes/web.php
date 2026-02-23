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

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Manajemen User
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::post('/users/{id}/approve', [UserController::class, 'approve'])
            ->name('users.approve');

        Route::post('/users/{id}/reject', [UserController::class, 'reject'])
            ->name('users.reject');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');


        //kategori

        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories.index');
        
        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::put('/categories/{id}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');


        // ======================
        // PRODUK
        // ======================
        Route::get('/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])
            ->name('products.index');

        Route::post('/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])
            ->name('products.store');

        Route::put('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])
            ->name('products.destroy');


        // ======================
        // SUPPLIER
        // ======================
        Route::get('/suppliers', [\App\Http\Controllers\Admin\SupplierController::class, 'index'])
            ->name('suppliers.index');

        Route::post('/suppliers', [\App\Http\Controllers\Admin\SupplierController::class, 'store'])
            ->name('suppliers.store');

        Route::put('/suppliers/{id}', [\App\Http\Controllers\Admin\SupplierController::class, 'update'])
            ->name('suppliers.update');

        Route::delete('/suppliers/{id}', [\App\Http\Controllers\Admin\SupplierController::class, 'destroy'])
            ->name('suppliers.destroy');


        // ======================
        // BARANG MASUK
        // ======================
        Route::get('/barang-masuk', [BarangMasukController::class, 'index'])
            ->name('barang-masuk.index');

        Route::post('/barang-masuk', [BarangMasukController::class, 'store'])
            ->name('barang-masuk.store');


        // ======================
        // BARANG KELUAR
        // ======================
        Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])
            ->name('barang-keluar.index');

        Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])
            ->name('barang-keluar.store');


        // ======================
        // LAPORAN
        // ======================
        Route::get('/laporan/stok', [\App\Http\Controllers\Admin\LaporanController::class, 'stok'])
            ->name('laporan.stok');

        Route::get('/laporan/transaksi', [\App\Http\Controllers\Admin\LaporanController::class, 'transaksi'])
            ->name('laporan.transaksi');

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
