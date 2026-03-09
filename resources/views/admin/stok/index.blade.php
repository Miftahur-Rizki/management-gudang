@extends('admin.layout.app')

@section('content')

<div class="container">
    <h3>Data Stok Barang</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if($product->stock == 0)
                        <span class="badge bg-danger">Habis</span>
                    @elseif($product->stock <= 10)
                        <span class="badge bg-warning">Hampir Habis</span>
                    @else
                        <span class="badge bg-success">Aman</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection