<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Penyewa;

class PenyewaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penyewa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(), // Menggunakan nama acak
            'email' => $this->faker->safeEmail(), // Menggunakan email acak yang aman
            'nomor_telepon' => $this->faker->phoneNumber(), // Menggunakan nomor telepon acak
            'alamat' => $this->faker->address(), // Menggunakan alamat acak
            'nomor_ktp' => $this->faker->regexify('[0-9]{16}'), // Menggunakan format acak untuk nomor KTP (16 digit angka)
            'tanggal_lahir' => $this->faker->date(), // Menggunakan tanggal acak
        ];
    }
}
