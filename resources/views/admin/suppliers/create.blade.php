@extends('admin.layout.app')

@section('title','Tambah Supplier')

@section('content')

<div class="card">
    <div class="card-header fw-bold bg-white">
        Tambah Supplier
    </div>
    <div class="card-body">

        <form action="{{ route('admin.suppliers.store') }}" method="POST">
            @include('admin.suppliers._form')
        </form>

    </div>
</div>

@endsection