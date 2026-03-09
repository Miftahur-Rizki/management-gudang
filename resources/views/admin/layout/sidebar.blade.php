{{-- <div class="sidebar d-flex flex-column p-3 bg-dark text-white" style="width: 260px; min-height:100vh;">

    <!-- Logo / Title -->
    <div class="text-center mb-4">
        <h5 class="fw-bold">
            <i class="bi bi-box-seam me-2"></i> Gudang Admin
        </h5>
        <small class="text-white-50">Management System</small>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">

        <!-- Dashboard -->
        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <hr class="text-secondary my-3">

        <!-- USER MANAGEMENT -->
        <small class="text-uppercase text-white-50 px-2 mb-2">User Management</small>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.users.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.users.index') }}">
                <i class="bi bi-person-check me-2"></i>
                Approve User
            </a>
        </li>

        <hr class="text-secondary my-3">

        <!-- MASTER DATA -->
        <small class="text-uppercase text-white-50 px-2 mb-2">Master Data</small>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.products.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.products.index') }}">
                <i class="bi bi-box-seam me-2"></i>
                Produk
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.categories.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.categories.index') }}">
                <i class="bi bi-tags me-2"></i>
                Kategori
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.suppliers.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.suppliers.index') }}">
                <i class="bi bi-truck me-2"></i>
                Supplier
            </a>
        </li>

        <hr class="text-secondary my-3">

        <!-- MONITORING -->
        <small class="text-uppercase text-white-50 px-2 mb-2">Monitoring</small>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.barang-masuk.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.barang-masuk.index') }}">
                <i class="bi bi-arrow-down-circle me-2"></i>
                Barang Masuk
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.barang-keluar.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.barang-keluar.index') }}">
                <i class="bi bi-arrow-up-circle me-2"></i>
                Barang Keluar
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.stok.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.stok.index') }}">
                <i class="bi bi-clipboard-data me-2"></i>
                View Stok
            </a>
        </li>

        <hr class="text-secondary my-3">

        <!-- REPORT -->
        <small class="text-uppercase text-white-50 px-2 mb-2">Laporan</small>

        <li class="nav-item mb-1">
            <a class="nav-link text-white {{ request()->routeIs('admin.laporan.*') ? 'active bg-primary' : '' }}"
               href="{{ route('admin.laporan.index') }}">
                <i class="bi bi-file-earmark-text me-2"></i>
                Laporan Transaksi
            </a>
        </li>

    </ul>

    <!-- Footer -->
    <hr class="text-secondary mt-4">

    <div class="text-center small text-white-50">
        © {{ date('Y') }} Gudang System
    </div>

</div> --}}

<div class="sidebar d-flex flex-column">

    <!-- Logo / Title -->
    <div class="text-center mb-4">
        <h5 class="fw-bold mb-1">
            <i class="bi bi-box-seam me-2"></i> Gudang Admin
        </h5>
        <small>Management System</small>
    </div>

    <ul class="nav flex-column mb-auto">

        <!-- Dashboard -->
        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <hr class="my-3">

        <!-- USER MANAGEMENT -->
        <small class="text-uppercase px-2 mb-2">User Management</small>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
               href="{{ route('admin.users.index') }}">
                <i class="bi bi-person-check me-2"></i>
                Approve User
            </a>
        </li>

        <hr class="my-3">

        <!-- MASTER DATA -->
        <small class="text-uppercase px-2 mb-2">Master Data</small>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
               href="{{ route('admin.products.index') }}">
                <i class="bi bi-box-seam me-2"></i>
                Produk
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
               href="{{ route('admin.categories.index') }}">
                <i class="bi bi-tags me-2"></i>
                Kategori
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}"
               href="{{ route('admin.suppliers.index') }}">
                <i class="bi bi-truck me-2"></i>
                Supplier
            </a>
        </li>

        <hr class="my-3">

        <!-- MONITORING -->
        <small class="text-uppercase px-2 mb-2">Monitoring</small>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.barang-masuk.*') ? 'active' : '' }}"
               href="{{ route('admin.barang-masuk.index') }}">
                <i class="bi bi-arrow-down-circle me-2"></i>
                Barang Masuk
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.barang-keluar.*') ? 'active' : '' }}"
               href="{{ route('admin.barang-keluar.index') }}">
                <i class="bi bi-arrow-up-circle me-2"></i>
                Barang Keluar
            </a>
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.stok.*') ? 'active' : '' }}"
               href="{{ route('admin.stok.index') }}">
                <i class="bi bi-clipboard-data me-2"></i>
                View Stok
            </a>
        </li>

        <hr class="my-3">

        <!-- REPORT -->
        <small class="text-uppercase px-2 mb-2">Laporan</small>

        <li class="nav-item mb-1">
            <a class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}"
               href="{{ route('admin.laporan.index') }}">
                <i class="bi bi-file-earmark-text me-2"></i>
                Laporan Transaksi
            </a>
        </li>

    </ul>

    <hr class="mt-4">

    <div class="text-center small sidebar-footer">
        © {{ date('Y') }} Gudang System
    </div>

</div>