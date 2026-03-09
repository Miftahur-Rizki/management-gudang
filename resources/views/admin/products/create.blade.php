@extends('admin.layout.app')

@section('title','Tambah Produk')

@section('content')

<div class="card">
    <div class="card-header bg-white fw-bold">
        Tambah Produk
    </div>
    <div class="card-body">

        <form action="{{ route('admin.products.store') }}" method="POST">
            @include('admin.products._form')
        </form>

    </div>
</div>

@endsection