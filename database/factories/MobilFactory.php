<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            'merk' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'model' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'tahun' => $this->faker->year(),
            'harga_per_hari' => $this->faker->word(),
            'status' => $this->faker->randomElement(["tersedia","disewa"]),
            'warna' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'nomor_polisi' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'deskripsi' => $this->faker->text(),
        ];
    }
}
