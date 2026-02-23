@extends('admin.layout.app')

@section('content')
<div class="container mt-4">

    <h3>Dashboard Admin</h3>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <h3>{{ $totalProduk }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5>Total User</h5>
                    <h3>{{ $totalUser }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5>Total Barang Masuk</h5>
                    <h3>{{ $totalMasuk }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5>Total Barang Keluar</h5>
                    <h3>{{ $totalKeluar }}</h3>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <h4>⚠ Produk Stok Minimum</h4>

    @if($stokMinimum->count() > 0)
        <table class="table table-bordered table-danger">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Minimum Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stokMinimum as $produk)
                <tr>
                    <td>{{ $produk->name }}</td>
                    <td>{{ $produk->stock }}</td>
                    <td>{{ $produk->minimum_stock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-success">
            Semua stok dalam kondisi aman 👍
        </div>
    @endif

</div>
@endsection