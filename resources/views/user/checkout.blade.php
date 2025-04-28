<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout</h1>

        <form action="{{ url('/user/checkout/submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Alamat Pengiriman</label>
                <input type="text" name="alamat_pengiriman" class="form-control" required minlength="10" maxlength="100">
            </div>
            <div class="mb-3">
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control" required pattern="[0-9]{5}">
            </div>
            <button type="submit" class="btn btn-success">Buat Faktur</button>
        </form>

        <a href="{{ url('/user/keranjang') }}" class="btn btn-secondary mt-3">Kembali ke Keranjang</a>
    </div>
</body>
</html>