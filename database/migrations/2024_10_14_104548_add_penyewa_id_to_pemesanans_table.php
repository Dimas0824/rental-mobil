<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            // Tambahkan kolom penyewa_id jika belum ada
            if (!Schema::hasColumn('pemesanans', 'penyewa_id')) {
                $table->unsignedBigInteger('penyewa_id')->nullable()->after('mobil_id');
            }

            // Ubah kolom penyewa_id menjadi tidak nullable
            $table->unsignedBigInteger('penyewa_id')->nullable(false)->change();

            // Tambahkan foreign key constraint
            $table->foreign('penyewa_id')->references('id')->on('penyewas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropForeign(['penyewa_id']);
            $table->dropColumn('penyewa_id');
        });
    }
};
