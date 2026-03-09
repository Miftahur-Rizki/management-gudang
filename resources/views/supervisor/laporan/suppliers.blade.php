@extends('supervisor.layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Data Supplier</h3>
        <p class="text-muted mb-0">Daftar supplier yang terdaftar pada sistem gudang.</p>
    </div>
</div>

@php
    $totalSupplier = $suppliers->count();
@endphp

<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Supplier</h6>
                <h3 class="mb-0 text-primary">{{ $totalSupplier }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white">
        <strong>Daftar Supplier</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name ?? '-' }}</td>
                            <td>{{ $item->address ?? '-' }}</td>
                            <td>{{ $item->phone ?? '-' }}</td>
                            <td>{{ $item->email ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Tidak ada data supplier.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection