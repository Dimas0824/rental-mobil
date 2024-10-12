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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('merk', 200);
            $table->string('model', 200);
            $table->year('tahun');
            $table->string('harga_per_hari');
            $table->enum('status', ["tersedia","disewa"]);
            $table->string('warna', 100);
            $table->string('nomor_polisi', 100);
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
