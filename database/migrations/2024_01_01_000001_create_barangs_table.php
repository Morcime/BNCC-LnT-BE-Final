<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('nama_barang', 80);
            $table->integer('harga_barang');
            $table->integer('jumlah_barang');
            $table->string('foto_barang');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('barangs');
    }
};