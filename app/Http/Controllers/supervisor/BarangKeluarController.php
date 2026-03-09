<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data = BarangKeluar::with('product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('supervisor.barang-keluar.index', compact('data'));
    }

    public function create()
    {
        return view('supervisor.barang-keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk'     => 'required|string',
            'quantity'   => 'required|numeric|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $product = Product::where('name', $request->produk)->first();

        if (!$product) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Produk tidak ditemukan. Silakan ketik nama produk yang sesuai.');
        }

        BarangKeluar::create([
            'product_id'     => $product->id,
            'quantity'       => $request->quantity,
            'tanggal_keluar' => now(),
            'keterangan'     => $request->keterangan,
            'created_by'     => Auth::id(),
            'status'         => 'pending',
        ]);

        return redirect()->route('supervisor.barang-keluar.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = BarangKeluar::with('product')->findOrFail($id);

        if ($data->status == 'approved') {
            return redirect()->route('supervisor.barang-keluar.index')
                ->with('error', 'Data sudah di-approve dan tidak bisa diedit');
        }

        return view('supervisor.barang-keluar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produk'     => 'required|string',
            'quantity'   => 'required|numeric|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $data = BarangKeluar::findOrFail($id);

        if ($data->status == 'approved') {
            return redirect()->route('supervisor.barang-keluar.index')
                ->with('error', 'Data sudah di-approve dan tidak bisa diubah');
        }

        $product = Product::where('name', $request->produk)->first();

        if (!$product) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Produk tidak ditemukan. Silakan ketik nama produk yang sesuai.');
        }

        $data->update([
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('supervisor.barang-keluar.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = BarangKeluar::findOrFail($id);

        if ($data->status == 'approved') {
            return redirect()->route('supervisor.barang-keluar.index')
                ->with('error', 'Data sudah di-approve dan tidak bisa dihapus');
        }

        $data->delete();

        return redirect()->route('supervisor.barang-keluar.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function approve($id)
    {
        $data = BarangKeluar::findOrFail($id);

        if ($data->status == 'approved') {
            return redirect()->route('supervisor.barang-keluar.index')
                ->with('error', 'Data sudah di-approve');
        }

        $product = Product::findOrFail($data->product_id);

        if ($product->stock < $data->quantity) {
            return redirect()->route('supervisor.barang-keluar.index')
                ->with('error', 'Stok tidak cukup');
        }

        $product->stock -= $data->quantity;
        $product->save();

        $data->status = 'approved';
        $data->approved_by = Auth::id();
        $data->save();

        return redirect()->route('supervisor.barang-keluar.index')
            ->with('success', 'Data berhasil di-approve');
    }
}