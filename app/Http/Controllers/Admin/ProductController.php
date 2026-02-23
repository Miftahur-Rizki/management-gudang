<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::all();

        return view('admin.products.index', compact('products','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'category_id' => 'required',
            'purchase_price' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'minimum_stock' => 'nullable|integer',
            'unit' => 'required'
        ]);

        Product::create($request->all());

        return back()->with('success','Produk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,'.$product->id,
            'category_id' => 'required',
            'purchase_price' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'minimum_stock' => 'nullable|integer',
            'unit' => 'required'
        ]);

        $product->update($request->all());

        return back()->with('success','Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return back()->with('success','Produk berhasil dihapus');
    }
}