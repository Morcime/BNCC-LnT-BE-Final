<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('admin.barangs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string',
            'nama_barang' => 'required|string|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'foto_barang' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('uploads/barangs'), $filename);
            $validated['foto_barang'] = $filename;
        }

        Barang::create($validated);
        return redirect('/admin/dashboard')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barangs.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kategori' => 'required|string',
            'nama_barang' => 'required|string|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('uploads/barangs'), $filename);
            $validated['foto_barang'] = $filename;
        }

        $barang->update($validated);
        return redirect('/admin/dashboard')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/admin/dashboard')->with('success', 'Barang berhasil dihapus');
    }
}