<<<<<<< HEAD
<nav class="navbar navbar-custom px-4 py-2 d-flex justify-content-between">

    <div>
        <strong>CV BERDIKARI</strong>
    </div>

    <div class="d-flex align-items-center gap-3">
        <span>
            <i class="bi bi-person-circle"></i>
            {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
=======
<nav class="navbar navbar-custom d-flex justify-content-between align-items-center">

    <div class="d-flex align-items-center gap-2">
        <i class="bi bi-box-seam fs-5 text-primary"></i>
        <span class="fw-bold text-dark">CV BERDIKARI</span>
    </div>

    <div class="d-flex align-items-center gap-3">

        <div class="d-flex align-items-center gap-2 text-muted">
            <i class="bi bi-person-circle fs-5"></i>
            <span class="fw-semibold">{{ auth()->user()->name }}</span>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mb-0">
>>>>>>> 7d0456c (upload project)
            @csrf
            <button class="btn btn-sm btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
<<<<<<< HEAD
=======

>>>>>>> 7d0456c (upload project)
    </div>

</nav>