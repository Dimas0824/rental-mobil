<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pemesanan::factory()
            ->count(10)
            ->create()
            ->each(function ($pemesanan) {
                $pemesanan->total_harga = $pemesanan->calculateTotalHarga();
                $pemesanan->save();
            });
    }
}
