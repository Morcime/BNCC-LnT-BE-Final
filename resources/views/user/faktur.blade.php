<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Faktur Pembelian</h1>

        <div class="card p-4">
            <h4>Nomor Invoice: {{ $invoice }}</h4>
            <h4>Total Bayar: Rp {{ number_format($total) }}</h4>
        </div>

        <a href="{{ url('/user/katalog') }}" class="btn btn-primary mt-3">Kembali ke Katalog</a>

        <form action="{{ url('/logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>