<div class="sidebar p-3">

<<<<<<< HEAD
    <h4 class="text-center mb-4">
        <i class="bi bi-clipboard-data"></i> Supervisor
    </h4>

    <ul class="nav flex-column">

        <li>
            <a class="nav-link" href="{{ route('supervisor.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Monitoring</small>

        <li>
            <a class="nav-link" href="#">
                <i class="bi bi-box-arrow-in-down"></i> Barang Masuk
=======
    <div class="text-center mb-4">
        <h4 class="fw-bold">
            <i class="bi bi-person-badge-fill"></i> Supervisor
        </h4>
        <small class="text-light">Sistem Gudang</small>
    </div>

    <ul class="nav flex-column">

        {{-- MENU UTAMA --}}
        <li class="mb-2 text-uppercase small text-light px-3">
            Menu Utama
        </li>

        <li>
            <a class="nav-link {{ request()->routeIs('supervisor.dashboard') ? 'active' : '' }}"
               href="{{ route('supervisor.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <hr class="text-white opacity-50">

        {{-- TRANSAKSI --}}
        <li class="mb-2 text-uppercase small text-light px-3">
            Transaksi Gudang
        </li>

        <li>
            <a class="nav-link {{ request()->routeIs('supervisor.barang-masuk.*') ? 'active' : '' }}"
               href="{{ route('supervisor.barang-masuk.index') }}">
                <i class="bi bi-box-arrow-in-down me-2"></i> Barang Masuk
>>>>>>> 7d0456c (upload project)
            </a>
        </li>

        <li>
<<<<<<< HEAD
            <a class="nav-link" href="#">
                <i class="bi bi-box-arrow-up"></i> Barang Keluar
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Approval</small>

        <li>
            <a class="nav-link" href="#}">
                <i class="bi bi-shield-check"></i> Koreksi Stok
=======
            <a class="nav-link {{ request()->routeIs('supervisor.barang-keluar.*') ? 'active' : '' }}"
               href="{{ route('supervisor.barang-keluar.index') }}">
                <i class="bi bi-box-arrow-up me-2"></i> Barang Keluar
            </a>
        </li>

        <hr class="text-white opacity-50">

        {{-- LAPORAN --}}
        <li class="mb-2 text-uppercase small text-light px-3">
            Laporan
        </li>

        <li>
            <a class="nav-link {{ request()->routeIs('supervisor.laporan.transaksi') ? 'active' : '' }}"
               href="{{ route('supervisor.laporan.transaksi') }}">
                <i class="bi bi-file-earmark-bar-graph me-2"></i> Laporan Transaksi
>>>>>>> 7d0456c (upload project)
            </a>
        </li>

        <li>
<<<<<<< HEAD
            <a class="nav-link" href="#">
                <i class="bi bi-clipboard-check"></i> Stok Opname
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Laporan</small>

        <li>
            <a class="nav-link" href="#">
                <i class="bi bi-file-earmark-bar-graph"></i> Laporan Stok
=======
            <a class="nav-link {{ request()->routeIs('supervisor.laporan.stok') ? 'active' : '' }}"
               href="{{ route('supervisor.laporan.stok') }}">
                <i class="bi bi-box-seam me-2"></i> View Stok
>>>>>>> 7d0456c (upload project)
            </a>
        </li>

        <li>
<<<<<<< HEAD
            <a class="nav-link" href="#">
                <i class="bi bi-calendar-range"></i> Laporan Periode
=======
            <a class="nav-link {{ request()->routeIs('supervisor.suppliers.*') ? 'active' : '' }}"
               href="{{ route('supervisor.suppliers.index') }}">
                <i class="bi bi-truck me-2"></i> View Supplier
>>>>>>> 7d0456c (upload project)
            </a>
        </li>

    </ul>

</div>