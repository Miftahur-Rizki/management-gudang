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

    <script>
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
        });
    }, 3000);
</script>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center py-3 border-bottom text-white">
                Gudang Admin
            </h4>

        <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>

        <!-- Management User -->
            <a href="{{ route('admin.users.index') }}">Management User</a>

            <hr class="bg-light">

        <!-- Master Data -->
            <div class="px-3 text-white fw-bold mt-2">
                Master Data
            </div>

            <a href="{{ route('admin.products.index') }}"> Produk</a>
            <a href="{{ route('admin.categories.index') }}"> Kategori</a>
            <a href="#"> Supplier</a>

            <hr class="bg-light">

        <!-- Monitoring -->
            <div class="px-3 text-white fw-bold mt-2">
                Monitoring
            </div>

            <a href="{{ route('admin.barang-masuk.index') }}"> Barang Masuk</a>
            <a href="{{ route('admin.barang-keluar.index') }}"> Barang Keluar</a>
            <hr class="bg-light">

        <!-- Laporan -->
            <div class="px-3 text-white fw-bold mt-2">
                Laporan
            </div>

            <a href="#"> Laporan Stok</a>
            <a href="#"> Laporan Transaksi</a>
        </div>


        <!-- Main area -->
        <div class="col-md-10 p-0">

            <!-- Navbar -->
            <nav class="navbar d-flex justify-content-between px-4 py-2">
                <div>
                    <strong>Admin</strong>
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
