@extends('admin.layout.app')

@section('content')
<div class="container">

    <h3>Laporan Transaksi</h3>

    <form method="GET" action="{{ route('admin.laporan.index') }}" class="row mb-3">
        <div class="col-md-3">
            <input type="date" name="from" class="form-control" value="{{ $from }}">
        </div>

        <div class="col-md-3">
            <input type="date" name="to" class="form-control" value="{{ $to }}">
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <hr>

    <h5>Barang Masuk</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Supplier</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangMasuk as $bm)
            <tr>
                <td>{{ $bm->kode_transaksi }}</td>
                <td>{{ $bm->tanggal_masuk }}</td>
                <td>{{ $bm->supplier->name ?? '-' }}</td>
                <td>{{ $bm->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Barang Keluar</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $bk)
            <tr>
                <td>{{ $bk->kode_transaksi }}</td>
                <td>{{ $bk->tanggal_keluar }}</td>
                <td>{{ $bk->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection