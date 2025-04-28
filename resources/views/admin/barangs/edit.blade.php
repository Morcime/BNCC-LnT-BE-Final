<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Barang</h1>

        <form action="{{ url('/admin/barang/update/'.$barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $barang->kategori }}" required>
            </div>
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required minlength="5" maxlength="80">
            </div>
            <div class="mb-3">
                <label>Harga Barang</label>
                <input type="number" name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}" required>
            </div>
            <div class="mb-3">
                <label>Jumlah Barang</label>
                <input type="number" name="jumlah_barang" class="form-control" value="{{ $barang->jumlah_barang }}" required>
            </div>
            <div class="mb-3">
                <label>Foto Barang</label>
                <input type="file" name="foto_barang" class="form-control">
                <small>Foto lama: <br><img src="{{ asset('uploads/barangs/'.$barang->foto_barang) }}" width="120"></small>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>