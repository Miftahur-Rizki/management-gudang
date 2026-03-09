@extends('supervisor.layout.app')

@section('content')

<div class="mb-3">
    <h4>Edit Barang Keluar</h4>
</div>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('supervisor.barang-keluar.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Produk</label>
        <input type="text"
               name="produk"
               class="form-control"
               placeholder="Masukkan nama produk"
               value="{{ old('produk', $data->product->name ?? '') }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="number"
               name="quantity"
               class="form-control"
               min="1"
               value="{{ old('quantity', $data->quantity) }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan"
                  class="form-control"
                  rows="4"
                  placeholder="Masukkan keterangan">{{ old('keterangan', $data->keterangan) }}</textarea>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('supervisor.barang-keluar.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>

@endsection