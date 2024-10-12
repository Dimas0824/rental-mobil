<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            'nama' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'email' => $this->faker->safeEmail(),
            'nomor_telepon' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'alamat' => $this->faker->text(),
            'nomor_ktp' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'tanggal_lahir' => $this->faker->date(),
        ];
    }
}
