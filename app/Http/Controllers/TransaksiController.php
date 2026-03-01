<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        Transaksi::create([
            'kode_transaksi' => 'TRX'.time(),
            'barang_id' => $request->barang_id,
            'user_id' => auth()->id(),
            'tipe' => $request->tipe,
            'qty' => $request->qty,
            'status' => 'pending'
        ]);

        return back()->with('success','Transaksi berhasil dibuat');
    }
}
