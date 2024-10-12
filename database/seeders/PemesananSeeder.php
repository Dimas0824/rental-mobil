<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::factory()->count(5)->create();
    }
}
