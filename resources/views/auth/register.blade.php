<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #ddeaf7; font-family: 'Poppins', sans-serif;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-5" style="width: 400px;">
            <h2 class="text-center mb-4">Register</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="nomor_hp" class="form-control" required/>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <p class="mt-3">Sudah punya akun? <a href="{{ url('/login') }}">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>