<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Admin - Barang</h1>
        <a href="{{ url('/admin/barang/create') }}" class="btn btn-success mb-3">Tambah Barang</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>Rp {{ number_format($barang->harga_barang) }}</td>
                    <td>{{ $barang->jumlah_barang }}</td>
                    <td><img src="{{ asset('uploads/barangs/'.$barang->foto_barang) }}" width="100"></td>
                    <td>
                        <a href="{{ url('/admin/barang/edit/'.$barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/admin/barang/delete/'.$barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger mt-3">Logout</button>
        </form>
    </div>
</body>
</html>