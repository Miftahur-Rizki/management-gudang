<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to   = $request->to;

        $barangMasuk = \App\Models\BarangMasuk::with('supplier')
            ->when($from && $to, function ($query) use ($from, $to) {
                $query->whereBetween('tanggal_masuk', [$from, $to]);
            })
            ->get();

        $barangKeluar = \App\Models\BarangKeluar::with('details')
            ->when($from && $to, function ($query) use ($from, $to) {
                $query->whereBetween('tanggal_keluar', [$from, $to]);
            })
            ->get();

        return view('admin.transaksi.laporan', compact(
            'barangMasuk',
            'barangKeluar',
            'from',
            'to'
        ));
    }
}
