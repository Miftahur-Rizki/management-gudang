<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Gudang')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            background-color: #f1f4f9;
            font-size: 14px;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #2F80ED, #1C5DD0);
            color: white;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            padding: 20px 15px;
        }

        .sidebar h5 {
            font-weight: 600;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 10px 12px;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
        }

        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.25);
            color: #ffffff !important;
            font-weight: 500;
        }

        .sidebar small {
            color: rgba(255,255,255,0.7) !important;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .sidebar hr {
            border-color: rgba(255,255,255,0.2);
        }

        .sidebar-footer {
            color: rgba(255,255,255,0.6);
            font-size: 12px;
            margin-top: 20px;
        }

        /* ================= CONTENT ================= */
        .content-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* ================= NAVBAR ================= */
        .navbar-custom {
            background: #ffffff;
            border-bottom: 1px solid #e6e9f2;
            padding: 15px 25px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-custom h5 {
            color: #2F80ED;
            font-weight: 600;
        }

        /* ================= MAIN ================= */
        .main-content {
            flex: 1;
            padding: 25px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }
        
        .dashboard-card {
            height: 170px; /* Kunci tinggi agar semua sama */
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-content {
            text-align: center;
        }

        .card-content h5 {
            margin-bottom: 10px;
            font-weight: 500;
        }

        .card-content h1 {
            font-size: 42px;
            font-weight: bold;
            margin: 0;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 991px) {
            .sidebar {
                left: -260px;
            }

            .sidebar.mobile-show {
                left: 0;
            }

            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

{{-- Sidebar --}}
@include('admin.layout.sidebar')

<div class="content-wrapper">

    {{-- Navbar --}}
    @include('admin.layout.navbar')

    <div class="main-content">

        {{-- Toast Notification --}}
        @if(session('success') || session('error'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div id="liveToast"
                class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }}"
                role="alert">

                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') ?? session('error') }}
                    </div>
                    <button type="button"
                            class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast">
                    </button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var toastEl = document.getElementById('liveToast');
                var toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                toast.show();
            });
        </script>
        @endif

        {{-- Validation Error --}}
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                Terjadi kesalahan, silakan periksa kembali input Anda.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>