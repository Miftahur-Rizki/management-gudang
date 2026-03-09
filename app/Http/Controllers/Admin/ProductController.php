<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index()
    {
        $products = Product::with('category')
                    ->latest()
                    ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'category_id' => 'required',
            'purchase_price' => 'nullable',
            'selling_price' => 'required',
            'stock' => 'required|numeric'
        ]);

        // Bersihkan format ribuan (hapus titik)
        $purchase = str_replace('.', '', $request->purchase_price);
        $selling  = str_replace('.', '', $request->selling_price);

        Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'purchase_price' => $purchase,
            'selling_price' => $selling,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // =========================
    // EDIT
    // =========================
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'category_id' => 'required',
            'purchase_price' => 'nullable',
            'selling_price' => 'required',
            'stock' => 'required|numeric'
        ]);

        // Bersihkan format ribuan
        $purchase = str_replace('.', '', $request->purchase_price);
        $selling  = str_replace('.', '', $request->selling_price);

        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'purchase_price' => $purchase,
            'selling_price' => $selling,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    public function stock()
    {
        $products = Product::with('category')->orderBy('name')->get();
        return view('admin.stok.index', compact('products'));
    }
}