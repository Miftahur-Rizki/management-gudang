<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangMasukDetail;
use App\Models\Product;

class BarangMasukController extends Controller
{
    public function approve($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);

        if ($barangMasuk->status == 'approved') {
            return back()->with('error', 'Sudah di approve');
        }

        $barangMasuk->status = 'approved';
        $barangMasuk->approved_by = auth()->id();
        $barangMasuk->save();

        // Tambah stok
        foreach ($barangMasuk->details as $detail) {
            $product = Product::find($detail->product_id);
            $product->increment('stock', $detail->quantity);
        }

        return back()->with('success', 'Berhasil di approve');
    }

    public function index()
    {
    $barangMasuk = BarangMasuk::with(['supplier','creator','approver'])
                    ->latest()
                    ->get();

    return view('admin.transaksi.barangmasuk', compact('barangMasuk'));
    }
}
