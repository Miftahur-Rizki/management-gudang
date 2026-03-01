@extends('admin.layout.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

    <!-- Stat Cards -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small>Total Barang</small>
                            <h3 class="fw-bold">{{ $totalBarang ?? 0 }}</h3>
                        </div>
                        <i class="bi bi-box fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small>Total Stok</small>
                            <h3 class="fw-bold">{{ $totalStok ?? 0 }}</h3>
                        </div>
                        <i class="bi bi-stack fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small>Total User</small>
                            <h3 class="fw-bold">{{ $totalUser ?? 0 }}</h3>
                        </div>
                        <i class="bi bi-people fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small>Transaksi Hari Ini</small>
                            <h3 class="fw-bold">{{ $transaksiHariIni ?? 0 }}</h3>
                        </div>
                        <i class="bi bi-arrow-left-right fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Grafik -->
    <div class="card shadow-sm border-0 mt-5">
        <div class="card-body">
            <h5 class="mb-3">Grafik Barang Masuk & Keluar</h5>
            <canvas id="chartTransaksi" height="100"></canvas>
        </div>
    </div>

    <!-- Stok Minimum -->
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <h5 class="mb-3 text-danger">⚠ Produk Stok Minimum</h5>

            @if(isset($stokMinimum) && $stokMinimum->count() > 0)
                <table class="table table-bordered table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Minimum</th>
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
    </div>

</div>

@endsection