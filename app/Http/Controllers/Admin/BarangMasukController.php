<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with('product')->latest()->get();
        $products = Product::all();

        return view('admin.barang_masuk.index', compact('barangMasuk','products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date'
        ]);

        // Simpan barang masuk
        BarangMasuk::create($request->all());

        // Tambah stok produk
        $product = Product::find($request->product_id);
        $product->increment('stock', $request->quantity);

        return back()->with('success','Barang masuk berhasil ditambahkan & stok diperbarui');
    }
}