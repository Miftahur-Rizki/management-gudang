@extends('supervisor.layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Laporan Stok Produk</h3>
        <p class="text-muted mb-0">Informasi stok seluruh produk yang tersedia di gudang.</p>
    </div>
</div>

@php
    $totalProduk = $products->count();
    $totalStok = $products->sum('stock');
    $stokAman = $products->where('stock', '>', 10)->count();
    $stokMenipis = $products->where('stock', '<=', 10)->where('stock', '>', 0)->count();
    $stokHabis = $products->where('stock', '<=', 0)->count();
@endphp

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Produk</h6>
                <h3 class="mb-0 text-primary">{{ $totalProduk }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Stok</h6>
                <h3 class="mb-0 text-success">{{ $totalStok }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Stok Menipis</h6>
                <h3 class="mb-0 text-warning">{{ $stokMenipis }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Stok Habis</h6>
                <h3 class="mb-0 text-danger">{{ $stokHabis }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white">
        <strong>Data Stok Produk</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Produk</th>
                        <th width="140">Stok</th>
                        <th width="180">Status Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                @if($item->stock <= 0)
                                    <span class="badge bg-danger">Habis</span>
                                @elseif($item->stock <= 10)
                                    <span class="badge bg-warning text-dark">Menipis</span>
                                @else
                                    <span class="badge bg-success">Aman</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Tidak ada produk tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection