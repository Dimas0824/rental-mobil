<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mobil;
use App\Models\MobilPenyewa;
use App\Models\Pemesanan;
use App\Models\Penyewa;

class PemesananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemesanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'mobil_id' => Mobil::factory(),
            'penyewa_id' => Penyewa::factory(),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
            'total_harga' => $this->faker->word(),
            'status' => $this->faker->randomElement(["pending","dibayar","selesai","dibatalkan"]),
            'mobil_penyewa_id' => MobilPenyewa::factory(),
        ];
    }
}
