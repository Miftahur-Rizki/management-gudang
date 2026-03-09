@extends('admin.layout.app')

@section('content')

<div class="container">
    <h3>Data Barang Masuk</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Supplier</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Petugas</th>
                <th>Supervisor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangMasuk as $item)
            <tr>
                <td>{{ $item->kode_transaksi }}</td>
                <td>{{ $item->supplier->name }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>
                    @if($item->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @else
                        <span class="badge bg-success">Approved</span>
                    @endif
                </td>
                <td>{{ $item->creator->name }}</td>
                <td>{{ $item->approver->name ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection