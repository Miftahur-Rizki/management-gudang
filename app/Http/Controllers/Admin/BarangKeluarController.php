<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with(['creator','approver'])
                            ->latest()
                            ->get();

        return view('admin.transaksi.barangkeluar', compact('barangKeluar'));
    }
}
