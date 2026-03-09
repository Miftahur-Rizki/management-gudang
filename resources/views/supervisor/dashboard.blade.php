@extends('supervisor.layout.app')

@section('content')

<h3 class="mb-4">Dashboard Supervisor</h3>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card card-stat p-3">
            <h6>Total Barang Masuk</h6>
            <h3>{{ $totalMasuk ?? 0 }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat p-3">
            <h6>Total Barang Keluar</h6>
            <h3>{{ $totalKeluar ?? 0 }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat p-3 bg-warning text-white">
            <h6>Barang Menipis</h6>
            <h3>{{ $barangMenipis ?? 0 }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat p-3 bg-danger text-white">
            <h6>Barang Overstock</h6>
            <h3>{{ $barangOverstock ?? 0 }}</h3>
        </div>
    </div>
</div>

<div class="card p-4 mb-4">
    <h5>Grafik Barang Masuk & Keluar</h5>
    <canvas id="chartBarang"></canvas>
</div>

<div class="card p-4">
    <h5>Barang Stok Menipis</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Minimum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listMenipis ?? [] as $barang)
            <tr>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->stok_minimum }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- perlu dibenerin der --}}

{{-- <script>
    const ctx = document.getElementById('chartBarang');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [
                {
                    label: 'Barang Masuk',
                    data: {!! json_encode($dataMasuk) !!},
                    backgroundColor: '#3b82f6'
                },
                {
                    label: 'Barang Keluar',
                    data: {!! json_encode($dataKeluar) !!},
                    backgroundColor: '#ef4444'
                }
            ]
        }
    });
</script> --}}

@endsection