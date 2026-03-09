<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Dashboard utama Supervisor
     */
    public function index()
    {
        // =========================
        // SUMMARY CARDS
        // =========================
        $totalPendingMasuk = DB::table('barang_masuk')
            ->where('status', 'pending')
            ->get();

        $totalPendingKeluar = DB::table('barang_keluar')
            ->where('status', 'pending')
            ->get();

        $totalTransaksi = DB::table('barang_masuk')->count()
            + DB::table('barang_keluar')->count();

        $totalSupplier = DB::table('suppliers')->count();

        // =========================
        // DATA UNTUK TABLE APPROVAL
        // =========================
        $pendingMasuk = DB::table('barang_masuk')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $pendingKeluar = DB::table('barang_keluar')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('supervisor.dashboard', compact(
            'totalPendingMasuk',
            'totalPendingKeluar',
            'totalTransaksi',
            'totalSupplier',
            'pendingMasuk',
            'pendingKeluar'
        ));
    }

    /**
     * Laporan Stok
     */
    public function stok()
    {
        $products = DB::table('products')
            ->select('id', 'name', 'stock', 'category_id')
            ->get();

        return view('supervisor.laporan.stok', compact('products'));
    }

    /**
     * Laporan Transaksi (Barang Masuk & Barang Keluar yang sudah approved)
     */
    public function transaksi()
    {
        $barangMasuk = DB::table('barang_masuk')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        $barangKeluar = DB::table('barang_keluar')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('supervisor.laporan.transaksi', compact('barangMasuk', 'barangKeluar'));
    }

    /**
     * View Supplier
     */
    public function supplier()
    {
        $suppliers = DB::table('suppliers')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('supervisor.laporan.suppliers', compact('suppliers'));
    }
}