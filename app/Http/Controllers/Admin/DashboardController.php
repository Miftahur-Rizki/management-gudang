<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

  public function index()
    {
        $totalProduk   = Product::count();
        $totalKategori = Category::count();
        $totalSupplier = Supplier::count();
        $userPending   = User::where('status', 'pending')->count();

        $stokMenipis = Product::where('stock', '<=', 10)->count();

        $transaksiHariIniMasuk = BarangMasuk::whereDate('tanggal_masuk', now())->count();
        $transaksiHariIniKeluar = BarangKeluar::whereDate('tanggal_keluar', now())->count();

        // ===== Grafik 7 Hari (Optimized) =====
        $startDate = Carbon::today()->subDays(6);
        $endDate   = Carbon::today();

        $masukData = BarangMasuk::selectRaw('DATE(tanggal_masuk) as tanggal, COUNT(*) as total')
            ->whereBetween('tanggal_masuk', [$startDate, $endDate])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $keluarData = BarangKeluar::selectRaw('DATE(tanggal_keluar) as tanggal, COUNT(*) as total')
            ->whereBetween('tanggal_keluar', [$startDate, $endDate])
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $labels = [];
        $dataMasuk = [];
        $dataKeluar = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->format('Y-m-d');

            $labels[] = Carbon::parse($date)->format('d M');
            $dataMasuk[] = $masukData[$date] ?? 0;
            $dataKeluar[] = $keluarData[$date] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalSupplier',
            'userPending',
            'stokMenipis',
            'transaksiHariIniMasuk',
            'transaksiHariIniKeluar',
            'labels',
            'dataMasuk',
            'dataKeluar'
        ));
    }
}