@extends('petugas.layout.app')

@section('content')

<h3 class="mb-4">Dashboard Petugas</h3>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card bg-success text-white shadow-sm">
            <div class="card-body">
                <h6>Barang Masuk Hari Ini</h6>
                <h3>{{ $masukHariIni ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-danger text-white shadow-sm">
            <div class="card-body">
                <h6>Barang Keluar Hari Ini</h6>
                <h3>{{ $keluarHariIni ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body">
                <h6>Total Transaksi Anda</h6>
                <h3>{{ $totalTransaksi ?? 0 }}</h3>
            </div>
        </div>
    </div>

</div>

@endsection