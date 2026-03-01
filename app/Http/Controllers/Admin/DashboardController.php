<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
{
    $totalBarang = Product::count();
    $totalStok = Product::sum('stock');
    $totalUser = User::count();
    //$transaksiHariIni = Transaksi::whereDate('created_at', today())->count();

    return view('admin.dashboard', compact(
        'totalBarang',
        'totalStok',
        'totalUser',
        //'transaksiHariIni'
    ));
}
}