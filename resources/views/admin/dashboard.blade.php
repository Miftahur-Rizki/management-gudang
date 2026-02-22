@extends('admin.layout.app')

@section('content')

<h3 class="mb-4">Dashboard Admin</h3>

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total User</h6>
                <h3>{{ $totalUsers }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>User Aktif</h6>
                <h3>{{ $activeUsers }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>User Pending</h6>
                <h3>{{ $pendingUsers }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>User Rejected</h6>
                <h3>{{ $rejectedUsers }}</h3>
            </div>
        </div>
    </div>

</div>

@endsection
