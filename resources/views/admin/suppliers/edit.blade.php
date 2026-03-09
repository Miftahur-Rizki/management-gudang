@extends('admin.layout.app')

@section('title','Edit Supplier')

@section('content')

<div class="card">
    <div class="card-header fw-bold bg-white">
        Edit Supplier
    </div>
    <div class="card-body">

        <form action="{{ route('admin.suppliers.update',$supplier->id) }}" method="POST">
            @method('PUT')
            @include('admin.suppliers._form')
        </form>

    </div>
</div>

@endsection