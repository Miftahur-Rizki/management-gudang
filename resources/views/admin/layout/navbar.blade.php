<nav class="navbar navbar-expand-lg navbar-custom px-4 py-3 shadow-sm">

    <!-- Left -->
    <div class="d-flex align-items-center">
        <h5 class="mb-0 fw-bold text-primary">
            CV BERDIKARI
        </h5>
    </div>

    <!-- Right -->
    <div class="ms-auto d-flex align-items-center">

        <div class="dropdown">
            <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
               href="#" role="button" data-bs-toggle="dropdown">

                <div class="me-2 text-end">
                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                    <small class="text-muted">Administrator</small>
                </div>

                <i class="bi bi-person-circle fs-4"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>

</nav>