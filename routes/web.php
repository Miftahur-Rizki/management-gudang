<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
=======

// ======================
// ADMIN CONTROLLERS
// ======================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
>>>>>>> 7d0456c (upload project)
use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\BarangKeluarController;
use App\Http\Controllers\Admin\LaporanController;

<<<<<<< HEAD
=======
// ======================
// SUPERVISOR CONTROLLERS
// ======================
use App\Http\Controllers\Supervisor\DashboardController as SupervisorDashboardController;
use App\Http\Controllers\Supervisor\BarangMasukController as SupervisorBarangMasukController;
use App\Http\Controllers\Supervisor\BarangKeluarController as SupervisorBarangKeluarController;

>>>>>>> 7d0456c (upload project)

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});


// ======================
<<<<<<< HEAD
// AUTH (login, register)
=======
// AUTH
>>>>>>> 7d0456c (upload project)
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

<<<<<<< HEAD
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

=======
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // USER
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/{id}/approve', [UserController::class, 'approve'])->name('users.approve');
        Route::post('/users/{id}/reject', [UserController::class, 'reject'])->name('users.reject');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // CATEGORY
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // BARANG MASUK
        Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index');
        Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store');

        // BARANG KELUAR
        Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar.index');
        Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');

        // LAPORAN
        Route::get('/laporan/stok', [LaporanController::class, 'stok'])->name('laporan.stok');
        Route::get('/laporan/transaksi', [LaporanController::class, 'transaksi'])->name('laporan.transaksi');
>>>>>>> 7d0456c (upload project)
    });


// ======================
// PETUGAS
// ======================
<<<<<<< HEAD
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::view('/petugas/dashboard', 'petugas.dashboard')
        ->name('petugas.dashboard');
=======
Route::middleware(['auth', 'role:petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Petugas\DashboardController::class, 'index'])
            ->name('dashboard');

        // Barang Masuk (view only)
        Route::get('/barang-masuk', [\App\Http\Controllers\Petugas\BarangMasukController::class, 'index'])
            ->name('barang-masuk.index');

        // Barang Keluar (create, view, update)
        Route::get('/barang-keluar', [\App\Http\Controllers\Petugas\BarangKeluarController::class, 'index'])
            ->name('barang-keluar.index');

        Route::get('/barang-keluar/create', [\App\Http\Controllers\Petugas\BarangKeluarController::class, 'create'])
            ->name('barang-keluar.create');

        Route::post('/barang-keluar', [\App\Http\Controllers\Petugas\BarangKeluarController::class, 'store'])
            ->name('barang-keluar.store');

        Route::get('/barang-keluar/{id}/edit', [\App\Http\Controllers\Petugas\BarangKeluarController::class, 'edit'])
            ->name('barang-keluar.edit');

        Route::put('/barang-keluar/{id}', [\App\Http\Controllers\Petugas\BarangKeluarController::class, 'update'])
            ->name('barang-keluar.update');

        // Laporan Stok
        Route::get('/laporan/stok', [\App\Http\Controllers\Petugas\DashboardController::class, 'stok'])
            ->name('laporan.stok');
>>>>>>> 7d0456c (upload project)
});


// ======================
// SUPERVISOR
// ======================
<<<<<<< HEAD
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
=======
Route::middleware(['auth', 'role:supervisor'])
    ->prefix('supervisor')
    ->name('supervisor.')
    ->group(function () {

        Route::get('/dashboard', [SupervisorDashboardController::class, 'index'])
            ->name('dashboard');

        // ======================
        // BARANG MASUK
        // ======================
        Route::get('/barang-masuk', [SupervisorBarangMasukController::class, 'index'])
            ->name('barang-masuk.index');

        Route::get('/barang-masuk/create', [SupervisorBarangMasukController::class, 'create'])
            ->name('barang-masuk.create');

        Route::post('/barang-masuk/store', [SupervisorBarangMasukController::class, 'store'])
            ->name('barang-masuk.store');

        Route::get('/barang-masuk/edit/{id}', [SupervisorBarangMasukController::class, 'edit'])
            ->name('barang-masuk.edit');

        Route::put('/barang-masuk/update/{id}', [SupervisorBarangMasukController::class, 'update'])
            ->name('barang-masuk.update');

        Route::delete('/barang-masuk/delete/{id}', [SupervisorBarangMasukController::class, 'destroy'])
            ->name('barang-masuk.destroy');

        Route::post('/barang-masuk/approve/{id}', [SupervisorBarangMasukController::class, 'approve'])
            ->name('barang-masuk.approve');

        // ======================
        // BARANG KELUAR
        // ======================
        Route::get('/barang-keluar', [SupervisorBarangKeluarController::class, 'index'])
            ->name('barang-keluar.index');

        Route::get('/barang-keluar/create', [SupervisorBarangKeluarController::class, 'create'])
            ->name('barang-keluar.create');

        Route::post('/barang-keluar/store', [SupervisorBarangKeluarController::class, 'store'])
            ->name('barang-keluar.store');

        Route::get('/barang-keluar/edit/{id}', [SupervisorBarangKeluarController::class, 'edit'])
            ->name('barang-keluar.edit');

        Route::put('/barang-keluar/update/{id}', [SupervisorBarangKeluarController::class, 'update'])
            ->name('barang-keluar.update');

        Route::delete('/barang-keluar/delete/{id}', [SupervisorBarangKeluarController::class, 'destroy'])
            ->name('barang-keluar.destroy');

        Route::post('/barang-keluar/approve/{id}', [SupervisorBarangKeluarController::class, 'approve'])
            ->name('barang-keluar.approve');

        Route::get('/laporan/transaksi', [SupervisorDashboardController::class, 'transaksi'])
            ->name('laporan.transaksi');

        Route::get('/laporan/stok', [SupervisorDashboardController::class, 'stok'])
            ->name('laporan.stok');

        Route::get('/suppliers', [SupervisorDashboardController::class, 'supplier'])
            ->name('suppliers.index');
    });

// ======================
// PROFILE
// ======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
>>>>>>> 7d0456c (upload project)
