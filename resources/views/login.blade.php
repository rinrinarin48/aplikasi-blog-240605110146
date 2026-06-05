<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f4f4f9;">
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="card border-0 shadow-sm" style="max-width:380px; width:100%;">
            <div class="card-body p-4">
                <h5 class="fw-semibold mb-1 text-center">Sistem Manajemen Blog</h5>
                <p class="text-muted small text-center mb-4">Silakan login untuk melanjutkan</p>

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Username</label>
                        <input type="text" name="user_name"
                            class="form-control @error('user_name') is-invalid @enderror"
                            value="{{ old('user_name') }}" placeholder="Masukkan username">
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size:13px;">Password</label>
                        <input type="password" name="password"
                            class="form-control" placeholder="Masukkan password">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
