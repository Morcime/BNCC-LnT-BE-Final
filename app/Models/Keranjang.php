<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'barang_id',
        'qty'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
