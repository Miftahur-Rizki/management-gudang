<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Supervisor - Sistem Gudang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<<<<<<< HEAD
   <!-- Bootstrap 5 -->
=======
    <!-- Bootstrap 5 -->
>>>>>>> 7d0456c (upload project)
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
<<<<<<< HEAD
=======
            font-family: Arial, sans-serif;
>>>>>>> 7d0456c (upload project)
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #0d6efd, #0b5ed7);
            color: white;
            position: fixed;
<<<<<<< HEAD
=======
            box-shadow: 4px 0 18px rgba(0, 0, 0, 0.08);
            z-index: 1000;
>>>>>>> 7d0456c (upload project)
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px 20px;
<<<<<<< HEAD
            border-radius: 8px;
            margin: 4px 10px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.15);
=======
            border-radius: 12px;
            margin: 6px 12px;
            transition: 0.2s ease-in-out;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(2px);
>>>>>>> 7d0456c (upload project)
        }

        .sidebar .nav-link.active {
            background: white;
            color: #0d6efd;
            font-weight: 600;
<<<<<<< HEAD
=======
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
>>>>>>> 7d0456c (upload project)
        }

        .content-wrapper {
            margin-left: 250px;
<<<<<<< HEAD
            padding: 20px;
=======
            padding: 22px;
>>>>>>> 7d0456c (upload project)
        }

        .navbar-custom {
            background: white;
<<<<<<< HEAD
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

=======
            border-bottom: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 14px 20px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #6b7280;
            margin-bottom: 0;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        }

        .summary-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: 0.2s ease;
            height: 100%;
        }

        .summary-card:hover {
            transform: translateY(-2px);
        }

        .summary-card .card-body {
            padding: 22px;
        }

        .summary-label {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .summary-value {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .content-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 24px;
            background: #fff;
        }

        .content-card .card-header {
            border-bottom: none;
            font-weight: 700;
            padding: 14px 20px;
        }

        .content-card .card-body {
            padding: 20px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: #f8fafc;
            color: #374151;
            font-weight: 600;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 10px;
        }

        .btn-sm {
            border-radius: 8px;
        }

        .form-control,
        .form-select,
        textarea {
            border-radius: 10px;
            padding: 10px 12px;
        }

        .badge {
            font-size: 12px;
            padding: 7px 10px;
            border-radius: 999px;
        }

        .empty-state {
            color: #6b7280;
            padding: 10px 0;
        }

        .quick-link-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>
>>>>>>> 7d0456c (upload project)
<body>

@include('supervisor.layout.sidebar')

<div class="content-wrapper">
    @include('supervisor.layout.navbar')

    <div class="mt-4">
        @yield('content')
    </div>
</div>

<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
=======
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

<script>
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(function () {
                alert.remove();
            }, 500);
        });
    }, 3000);
</script>

>>>>>>> 7d0456c (upload project)
</body>
</html>