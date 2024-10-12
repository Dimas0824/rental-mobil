<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pembayaran;
use App\Models\Pemesanan;

class PembayaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pembayaran::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pemesanan_id' => Pemesanan::factory(),
            'metode_pembayaran' => $this->faker->randomElement(["transfer","kartu_kredit","e-wallet"]),
            'jumlah_pembayaran' => $this->faker->word(),
            'tanggal_pembayaran' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["berhasil","gagal"]),
        ];
    }
}
