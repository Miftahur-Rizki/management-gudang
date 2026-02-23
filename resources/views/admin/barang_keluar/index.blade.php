@extends('admin.layout.app')

@section('content')
<div class="container mt-4">

    <h3>Barang Keluar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.barang-keluar.store') }}">
        @csrf

        <div class="row mb-3">

            <div class="col-md-4">
                <select name="product_id" class="form-control" required>
                    <option value="">Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} (Stok: {{ $product->stock }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <input type="number" name="quantity" class="form-control" placeholder="Jumlah" required>
            </div>

            <div class="col-md-3">
                <input type="date" name="tanggal_keluar" class="form-control" required>
            </div>

            <div class="col-md-3">
                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
            </div>

        </div>

        <button class="btn btn-danger">Simpan</button>
    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection