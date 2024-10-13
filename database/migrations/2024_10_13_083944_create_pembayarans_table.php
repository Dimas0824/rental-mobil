<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id');
            $table->enum('metode_pembayaran', ["transfer","kartu_kredit","e-wallet"]);
            $table->string('jumlah_pembayaran');
            $table->dateTime('tanggal_pembayaran');
            $table->enum('status', ["berhasil","gagal"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
