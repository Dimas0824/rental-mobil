<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mobil;

class MobilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mobil::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'merk' => $this->faker->company(), // Menggunakan nama perusahaan sebagai merk
            'model' => $this->faker->word(), // Menggunakan kata acak sebagai model
            'tahun' => $this->faker->year(), // Menggunakan tahun acak
            'harga_per_hari' => $this->faker->randomFloat(2, 100000, 1000000), // Menggunakan harga acak antara 100000 dan 1000000 dengan 2 digit desimal
            'status' => $this->faker->randomElement(['tersedia', 'disewa']), // Menggunakan elemen acak dari array status
            'warna' => $this->faker->safeColorName(), // Menggunakan nama warna yang aman
            'nomor_polisi' => strtoupper($this->faker->bothify('??####??')), // Menggunakan format acak untuk nomor polisi
            'deskripsi' => $this->faker->sentence(), // Menggunakan kalimat acak sebagai deskripsi
        ];
    }
}
