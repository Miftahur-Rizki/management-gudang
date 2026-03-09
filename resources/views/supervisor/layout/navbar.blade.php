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
            @csrf
            <button class="btn btn-sm btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

</nav>