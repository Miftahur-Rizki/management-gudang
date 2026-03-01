<div class="sidebar p-3">

    <h4 class="text-center mb-4">
        <i class="bi bi-box-seam"></i> Gudang Admin
    </h4>

    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Manajemen User</small>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
               href="{{ route('admin.users.index') }}">
                <i class="bi bi-people"></i> Data User
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Master Data</small>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-box"></i> Data Barang
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                 <i class="bi bi-tags"></i> Kategori
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-truck"></i> Supplier
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-geo-alt"></i> Lokasi Rak
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Transaksi</small>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-box-arrow-in-down"></i> Barang Masuk
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-box-arrow-up"></i> Barang Keluar
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-shield-check"></i> Approve Koreksi
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Laporan</small>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-clipboard-data"></i> Laporan Stok
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-calendar-range"></i> Laporan Periode
            </a>
        </li>

        <hr class="text-white">

        <small class="text-white-50 px-3">Pengaturan</small>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-gear"></i> Pengaturan Sistem
            </a>
        </li>

    </ul>

</div>