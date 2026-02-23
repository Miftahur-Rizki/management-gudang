@extends('admin.layout.app')

@section('content')
<div class="container mt-4">

    <h3>Data Produk</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <form method="POST" action="{{ route('admin.products.store') }}">
        @csrf

        <div class="row mb-3">

            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Nama Produk" required>
            </div>

            <div class="col-md-2">
                <input type="text" name="sku" class="form-control" placeholder="SKU" required>
            </div>

            <div class="col-md-2">
                <select name="category_id" class="form-control" required>
                    <option value="">Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <input type="number" name="purchase_price" class="form-control" placeholder="Harga Beli">
            </div>

            <div class="col-md-2">
                <input type="number" name="selling_price" class="form-control" placeholder="Harga Jual">
            </div>

            <div class="col-md-1">
                <input type="number" name="minimum_stock" class="form-control" placeholder="Min">
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <select name="unit" class="form-control">
                    <option value="pcs">pcs</option>
                    <option value="box">box</option>
                    <option value="karton">karton</option>
                </select>
            </div>

            <div class="col-md-3">
                <input type="date" name="expired_date" class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">Tambah Produk</button>
            </div>

        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>SKU</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Min Stok</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr @if($product->stock <= $product->minimum_stock) class="table-danger" @endif>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->minimum_stock }}</td>
                <td>{{ $product->unit }}</td>
                <td>
                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection