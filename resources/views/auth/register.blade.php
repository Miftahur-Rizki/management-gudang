<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Sistem Gudang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, #0d6efd, #0dcaf0);">

<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-md-4 col-lg-3">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body p-3">
                    
                    <h4 class="text-center mb-3">Register</h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/register">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label small">Nama</label>
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small">Role</label>
                            <select name="role" class="form-select form-select-sm" required>
                                <option value="">Pilih Role</option>
                                <option value="petugas">Petugas</option>
                                <option value="supervisor">Supervisor</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm w-100">
                            Register
                        </button>
                    </form>

                    <div class="text-center mt-2">
                        <small>
                            Sudah punya akun?
                            <a href="/login">Login</a>
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
