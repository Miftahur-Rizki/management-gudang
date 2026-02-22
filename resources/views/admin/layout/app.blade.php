<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Sistem Gudang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            background: #0d6efd;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
        }
        .content {
            padding: 20px;
        }
        .navbar {
            background: white;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center py-3 border-bottom">
                Gudang Admin
            </h4>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.users') }}">Manajemen User</a>
            <a href="#">Produk</a>
            <a href="{{ route('admin.categories') }}">Kategori</a>
            <a href="#">Supplier</a>
        </div>

        <!-- Main area -->
        <div class="col-md-10 p-0">

            <!-- Navbar -->
            <nav class="navbar d-flex justify-content-between px-4 py-2">
                <div>
                    <strong>Admin Panel</strong>
                </div>

                <div>
                    {{ auth()->user()->name }}

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>

        </div>
    </div>
</div>

</body>
</html>
