@extends('supervisor.layout.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Data Barang Keluar</h4>
    <a href="{{ route('supervisor.barang-keluar.create') }}" class="btn btn-primary">
        Tambah Barang Keluar
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th width="260">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->product->name ?? '-' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
            <td>
                @if($item->status == 'approved')
                    <span class="badge bg-success">Approved</span>
                @else
                    <span class="badge bg-warning text-dark">Pending</span>
                @endif
            </td>
            <td>
                @if($item->status == 'pending')
                    <a href="{{ route('supervisor.barang-keluar.edit', $item->id) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('supervisor.barang-keluar.destroy', $item->id) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus data ini?')">
                            Hapus
                        </button>
                    </form>

                    <form action="{{ route('supervisor.barang-keluar.approve', $item->id) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        <button type="submit"
                                class="btn btn-sm btn-success"
                                onclick="return confirm('Approve data ini?')">
                            Approve
                        </button>
                    </form>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Data barang keluar belum ada</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection