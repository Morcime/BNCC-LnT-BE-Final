<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Keranjang Saya</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($keranjangs as $keranjang)
                @php $subtotal = $keranjang->barang->harga_barang * $keranjang->qty; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $keranjang->barang->nama_barang }}</td>
                    <td>Rp {{ number_format($keranjang->barang->harga_barang) }}</td>
                    <td>{{ $keranjang->qty }}</td>
                    <td>Rp {{ number_format($subtotal) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-3">Total Harga: Rp {{ number_format($total) }}</h4>

        <a href="{{ url('/user/checkout') }}" class="btn btn-success mt-3">Checkout</a>
        <a href="{{ url('/user/katalog') }}" class="btn btn-primary mt-3">Kembali ke Katalog</a>

        <form action="{{ url('/logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>