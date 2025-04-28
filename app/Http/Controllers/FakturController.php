<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function katalog()
    {
        $barangs = Barang::all();
        return view('user.katalog', compact('barangs'));
    }

    public function addToKeranjang(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        if ($barang->jumlah_barang <= 0) {
            return back()->with('error', 'Barang habis!');
        }

        Keranjang::create([
            'user_id' => Auth::id(),
            'barang_id' => $barang->id,
            'qty' => 1
        ]);

        return redirect('/user/keranjang')->with('success', 'Berhasil tambah ke keranjang!');
    }

    public function keranjang()
    {
        $keranjangs = Keranjang::where('user_id', Auth::id())->with('barang')->get();
        return view('user.keranjang', compact('keranjangs'));
    }

    public function checkout()
    {
        $keranjangs = Keranjang::where('user_id', Auth::id())->with('barang')->get();
        return view('user.checkout', compact('keranjangs'));
    }
}