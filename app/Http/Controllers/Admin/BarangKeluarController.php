<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('product')->latest()->get();
        $products = Product::all();

        return view('admin.barang_keluar.index', compact('barangKeluar','products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date'
        ]);

        $product = Product::find($request->product_id);

        // ❗ Cek stok cukup atau tidak
        if ($product->stock < $request->quantity) {
            return back()->with('error','Stok tidak mencukupi!');
        }

        // Simpan barang keluar
        BarangKeluar::create($request->all());

        // Kurangi stok
        $product->decrement('stock', $request->quantity);

        return back()->with('success','Barang keluar berhasil & stok diperbarui');
    }
}