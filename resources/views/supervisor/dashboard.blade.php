@extends('supervisor.layout.app')

@section('content')

<<<<<<< HEAD
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
=======
@php
    $jumlahPendingMasuk = count($totalPendingMasuk);
    $jumlahPendingKeluar = count($totalPendingKeluar);
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title">Dashboard Supervisor</h2>
        <p class="page-subtitle">Ringkasan aktivitas gudang dan data yang perlu diperiksa.</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card summary-card">
            <div class="card-body">
                <div class="summary-label">Pending Barang Masuk</div>
                <h2 class="summary-value text-primary">{{ $jumlahPendingMasuk }}</h2>
                <small class="text-muted">Menunggu approval</small>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card summary-card">
            <div class="card-body">
                <div class="summary-label">Pending Barang Keluar</div>
                <h2 class="summary-value text-success">{{ $jumlahPendingKeluar }}</h2>
                <small class="text-muted">Menunggu approval</small>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card summary-card">
            <div class="card-body">
                <div class="summary-label">Total Transaksi</div>
                <h2 class="summary-value text-dark">{{ $totalTransaksi }}</h2>
                <small class="text-muted">Barang masuk + barang keluar</small>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card summary-card">
            <div class="card-body">
                <div class="summary-label">Total Supplier</div>
                <h2 class="summary-value text-secondary">{{ $totalSupplier }}</h2>
                <small class="text-muted">Supplier terdaftar</small>
            </div>
>>>>>>> 7d0456c (upload project)
        </div>
    </div>
</div>

<<<<<<< HEAD
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
=======
<div class="row mb-4">
    <div class="col-md-8 mb-3">
        <div class="card content-card h-100">
            <div class="card-header bg-primary text-white">
                Statistik Ringkas Gudang
            </div>
            <div class="card-body">
                <div style="height: 220px;">
                    <canvas id="gudangChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card content-card h-100">
            <div class="card-header bg-success text-white">
                Komposisi Data
            </div>
            <div class="card-body">
                <div style="height: 220px;">
                    <canvas id="komposisiChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card content-card mb-4">
    <div class="card-header bg-primary text-white">
        Approval Barang Masuk
    </div>
    <div class="card-body">
        @if(count($pendingMasuk) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Produk</th>
                            <th width="120">Jumlah</th>
                            <th width="180">Tanggal</th>
                            <th>Keterangan</th>
                            <th width="120">Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingMasuk as $item)
                            @php
                                $namaProduk = \Illuminate\Support\Facades\DB::table('products')
                                    ->where('id', $item->product_id)
                                    ->value('name');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $namaProduk ?? 'Produk tidak ditemukan' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    {{ $item->tanggal_masuk ? \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y H:i') : '-' }}
                                </td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                </td>
                                <td>
                                    <form action="{{ route('supervisor.barang-masuk.approve', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm btn-success"
                                                onclick="return confirm('Approve barang masuk ini?')">
                                            Approve
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">Tidak ada data barang masuk yang perlu di-approve.</div>
        @endif
    </div>
</div>

<div class="card content-card mb-4">
    <div class="card-header bg-success text-white">
        Approval Barang Keluar
    </div>
    <div class="card-body">
        @if(count($pendingKeluar) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Produk</th>
                            <th width="120">Jumlah</th>
                            <th width="180">Tanggal</th>
                            <th>Keterangan</th>
                            <th width="120">Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingKeluar as $item)
                            @php
                                $namaProduk = \Illuminate\Support\Facades\DB::table('products')
                                    ->where('id', $item->product_id)
                                    ->value('name');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $namaProduk ?? 'Produk tidak ditemukan' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    {{ $item->tanggal_keluar ? \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y H:i') : '-' }}
                                </td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                </td>
                                <td>
                                    <form action="{{ route('supervisor.barang-keluar.approve', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-sm btn-success"
                                                onclick="return confirm('Approve barang keluar ini?')">
                                            Approve
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">Tidak ada data barang keluar yang perlu di-approve.</div>
        @endif
    </div>
</div>

<div class="card content-card">
    <div class="card-header bg-light">
        Akses Cepat
    </div>
    <div class="card-body">
        <div class="quick-link-wrap">
            <a href="{{ route('supervisor.barang-masuk.index') }}" class="btn btn-outline-primary">
                Kelola Barang Masuk
            </a>
            <a href="{{ route('supervisor.barang-keluar.index') }}" class="btn btn-outline-success">
                Kelola Barang Keluar
            </a>
            <a href="{{ route('supervisor.laporan.transaksi') }}" class="btn btn-outline-warning">
                Laporan Transaksi
            </a>
            <a href="{{ route('supervisor.laporan.stok') }}" class="btn btn-outline-info">
                View Stok
            </a>
            <a href="{{ route('supervisor.suppliers.index') }}" class="btn btn-outline-secondary">
                View Supplier
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const gudangCanvas = document.getElementById('gudangChart');
    if (gudangCanvas) {
        new Chart(gudangCanvas, {
            type: 'bar',
            data: {
                labels: ['Pending Masuk', 'Pending Keluar', 'Total Transaksi', 'Total Supplier'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [
                        {{ $jumlahPendingMasuk }},
                        {{ $jumlahPendingKeluar }},
                        {{ $totalTransaksi }},
                        {{ $totalSupplier }}
                    ],
                    backgroundColor: [
                        'rgba(13, 110, 253, 0.7)',
                        'rgba(25, 135, 84, 0.7)',
                        'rgba(33, 37, 41, 0.7)',
                        'rgba(108, 117, 125, 0.7)'
                    ],
                    borderColor: [
                        'rgba(13, 110, 253, 1)',
                        'rgba(25, 135, 84, 1)',
                        'rgba(33, 37, 41, 1)',
                        'rgba(108, 117, 125, 1)'
                    ],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }

    const komposisiCanvas = document.getElementById('komposisiChart');
    if (komposisiCanvas) {
        new Chart(komposisiCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Pending Masuk', 'Pending Keluar', 'Supplier'],
                datasets: [{
                    data: [
                        {{ $jumlahPendingMasuk }},
                        {{ $jumlahPendingKeluar }},
                        {{ $totalSupplier }}
                    ],
                    backgroundColor: [
                        'rgba(13, 110, 253, 0.7)',
                        'rgba(25, 135, 84, 0.7)',
                        'rgba(108, 117, 125, 0.7)'
                    ],
                    borderColor: [
                        'rgba(13, 110, 253, 1)',
                        'rgba(25, 135, 84, 1)',
                        'rgba(108, 117, 125, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
</script>
@endpush
>>>>>>> 7d0456c (upload project)
