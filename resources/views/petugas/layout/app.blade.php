<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Petugas - Sistem Gudang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #0d6efd, #0b5ed7);
            color: white;
            position: fixed;
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 10px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.15);
        }

        .sidebar .nav-link.active {
            background: white;
            color: #0d6efd;
            font-weight: 600;
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-custom {
            background: white;
            border-bottom: 1px solid #ddd;
        }

        .card {
            border-radius: 15px;
        }
    </style>
</head>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
        });
    }, 3000);
</script>

<body>

@include('petugas.layout.sidebar')

<div class="content-wrapper">
    @include('petugas.layout.navbar')

    <div class="mt-4">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>