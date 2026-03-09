@extends('supervisor.layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Laporan Transaksi</h3>
        <p class="text-muted mb-0">Laporan data barang masuk dan barang keluar yang sudah disetujui.</p>
    </div>
</div>

@php
    $totalBarangMasuk = $barangMasuk->sum('quantity');
    $totalBarangKeluar = $barangKeluar->sum('quantity');
    $jumlahTransaksiMasuk = $barangMasuk->count();
    $jumlahTransaksiKeluar = $barangKeluar->count();
@endphp

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Transaksi Masuk</h6>
                <h3 class="mb-0 text-primary">{{ $jumlahTransaksiMasuk }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Qty Masuk</h6>
                <h3 class="mb-0 text-primary">{{ $totalBarangMasuk }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Transaksi Keluar</h6>
                <h3 class="mb-0 text-success">{{ $jumlahTransaksiKeluar }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Qty Keluar</h6>
                <h3 class="mb-0 text-success">{{ $totalBarangKeluar }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <strong>Barang Masuk (Approved)</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Produk</th>
                        <th width="100">Qty</th>
                        <th width="180">Tanggal Masuk</th>
                        <th>Keterangan</th>
                        <th width="100">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangMasuk as $item)
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
                                <span class="badge bg-success">Approved</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada barang masuk yang sudah disetujui.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-success text-white">
        <strong>Barang Keluar (Approved)</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Produk</th>
                        <th width="100">Qty</th>
                        <th width="180">Tanggal Keluar</th>
                        <th>Keterangan</th>
                        <th width="100">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangKeluar as $item)
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
                                <span class="badge bg-success">Approved</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada barang keluar yang sudah disetujui.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection