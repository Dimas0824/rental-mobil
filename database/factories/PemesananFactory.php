<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mobil;
use App\Models\Pemesanan;
use Carbon\Carbon;

class PemesananFactory extends Factory
{
    protected $model = Pemesanan::class;

    public function definition(): array
    {
        // Generate start and end dates
        $tanggal_mulai = $this->faker->dateTimeBetween('-1 year', 'now');
        $tanggal_selesai = Carbon::instance($tanggal_mulai)->addDays(rand(1, 90));

        $status = $this->faker->randomElement(["pending", "dibayar", "selesai", "dibatalkan"]);

        return [
            'mobil_id' => Mobil::factory(),
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'total_harga' => $status === 'dibatalkan' ? 0 : null, // If canceled, total_harga is 0
            'status' => $status,
        ];
    }
}
