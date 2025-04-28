<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nomor_invoice')->unique();
            $table->text('alamat_pengiriman');
            $table->string('kode_pos', 5);
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('fakturs');
    }
};