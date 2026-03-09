@extends('admin.layout.app')

@section('content')

<div class="container">
    <h3>Data Barang Keluar</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Petugas</th>
                <th>Supervisor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $item)
            <tr>
                <td>{{ $item->kode_transaksi }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
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