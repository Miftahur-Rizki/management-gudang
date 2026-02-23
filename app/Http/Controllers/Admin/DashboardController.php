<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $totalUser = User::count();
        $totalMasuk = BarangMasuk::count();
        $totalKeluar = BarangKeluar::count();

        // Produk dengan stok <= minimum_stock
        $stokMinimum = Product::whereColumn('stock', '<=', 'minimum_stock')->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalUser',
            'totalMasuk',
            'totalKeluar',
            'stokMinimum'
        ));
    }
}