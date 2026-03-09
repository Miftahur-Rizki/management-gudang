<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function transaksi()
    {
        $barangMasuk = DB::table('barang_masuk')
            ->where('status', 'approved')
            ->orderBy('tanggal_masuk', 'desc')
            ->get();

        $barangKeluar = DB::table('barang_keluar')
            ->where('status', 'approved')
            ->orderBy('tanggal_keluar', 'desc')
            ->get();

        return view('supervisor.laporan.transaksi', compact('barangMasuk', 'barangKeluar'));
    }

    public function stok()
    {
        $products = DB::table('products')->get();
        return view('supervisor.laporan.stok', compact('products'));
    }
}