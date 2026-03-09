@extends('admin.layout.app')

@section('title','Edit Produk')

@section('content')

<div class="card">
    <div class="card-header bg-white fw-bold">
        Edit Produk
    </div>
    <div class="card-body">

        <form action="{{ route('admin.products.update',$product->id) }}" method="POST">
            @method('PUT')
            @include('admin.products._form')
        </form>

    </div>
</div>

@endsection