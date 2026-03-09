@extends('admin.layout.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

    <!-- ===================== -->
    <!-- STATISTIK UTAMA -->
    <!-- ===================== -->
    <div class="row g-4">

        <!-- Total Produk -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-primary text-white rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:140px;">
                    <small class="mb-2">Total Produk</small>
                    <h2 class="fw-bold mb-0">{{ $totalProduk }}</h2>
                </div>
            </div>
        </div>

        <!-- Stok Menipis -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-warning text-dark rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:140px;">
                    <small class="mb-2">Stok Menipis (≤10)</small>
                    <h2 class="fw-bold mb-0">{{ $stokMenipis }}</h2>
                </div>
            </div>
        </div>

        <!-- Barang Masuk Hari Ini -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-success text-white rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:140px;">
                    <small class="mb-2">Barang Masuk Hari Ini</small>
                    <h2 class="fw-bold mb-0">{{ $transaksiHariIniMasuk }}</h2>
                </div>
            </div>
        </div>

        <!-- Barang Keluar Hari Ini -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-danger text-white rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:140px;">
                    <small class="mb-2">Barang Keluar Hari Ini</small>
                    <h2 class="fw-bold mb-0">{{ $transaksiHariIniKeluar }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Divider -->
    <hr class="my-5">

    <!-- ===================== -->
    <!-- STATISTIK TAMBAHAN -->
    <!-- ===================== -->
    <div class="row g-4">

        <!-- Total Kategori -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-secondary text-white rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:120px;">
                    <h6 class="mb-2">Total Kategori</h6>
                    <h3 class="fw-bold mb-0">{{ $totalKategori }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Supplier -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-dark text-white rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:120px;">
                    <h6 class="mb-2">Total Supplier</h6>
                    <h3 class="fw-bold mb-0">{{ $totalSupplier }}</h3>
                </div>
            </div>
        </div>

        <!-- User Pending -->
        <div class="col-md-3">
            <div class="card shadow border-0 bg-info text-white rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" style="min-height:120px;">
                    <h6 class="mb-2">User Pending Approval</h6>
                    <h3 class="fw-bold mb-0">{{ $userPending }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Divider -->
    <hr class="my-5">

    <!-- ===================== -->
    <!-- GRAFIK TRANSAKSI -->
    <!-- ===================== -->
    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <h5 class="mb-4">Grafik Transaksi 7 Hari Terakhir</h5>
            <canvas id="chartTransaksi" height="100"></canvas>
        </div>
    </div>

</div>

@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartTransaksi');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [
                {
                    label: 'Barang Masuk',
                    data: @json($dataMasuk),
                    borderWidth: 3,
                    tension: 0.4
                },
                {
                    label: 'Barang Keluar',
                    data: @json($dataKeluar),
                    borderWidth: 3,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });
</script>
@endsection