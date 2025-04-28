<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Katalog Barang</h1>

        <div class="row">
            @foreach ($barangs as $barang)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('uploads/barangs/'.$barang->foto_barang) }}" class="card-img-top" alt="foto barang">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text">Rp {{ number_format($barang->harga_barang) }}</p>
                        <form action="{{ url('/user/add-to-keranjang/'.$barang->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a href="{{ url('/user/keranjang') }}" class="btn btn-success">Lihat Keranjang</a>
        <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>