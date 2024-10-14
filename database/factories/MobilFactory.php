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
        // Daftar merk mobil yang umum di dunia nyata
        $carBrands = ['Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes-Benz', 'Hyundai', 'Nissan', 'Chevrolet', 'Mazda', 'Volkswagen'];

        // Daftar model yang sesuai dengan masing-masing merk
        $carModels = [
            'Toyota' => ['Corolla', 'Camry', 'Yaris', 'Fortuner', 'Hilux'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'HR-V', 'Jazz'],
            'Ford' => ['Focus', 'Fiesta', 'Mustang', 'Ranger', 'Explorer'],
            'BMW' => ['X5', 'X3', '3 Series', '5 Series', '7 Series'],
            'Mercedes-Benz' => ['A-Class', 'C-Class', 'E-Class', 'S-Class', 'GLE'],
            'Hyundai' => ['Elantra', 'Santa Fe', 'Tucson', 'Palisade', 'Accent'],
            'Nissan' => ['Altima', 'Sentra', 'Kicks', 'Pathfinder', 'Rogue'],
            'Chevrolet' => ['Malibu', 'Impala', 'Equinox', 'Suburban', 'Silverado'],
            'Mazda' => ['Mazda3', 'CX-5', 'Mazda6', 'CX-9', 'MX-5 Miata'],
            'Volkswagen' => ['Golf', 'Passat', 'Tiguan', 'Jetta', 'Polo']
        ];

        // Memilih merk acak
        $brand = $this->faker->randomElement($carBrands);

        // Memilih model acak berdasarkan merk yang dipilih
        $model = $this->faker->randomElement($carModels[$brand]);

        return [
            'gambar' => $this->faker->imageUrl(640, 480, 'cars', true, 'Faker', true, 'jpg'), //gambar mobil acak
            'merk' => $brand, // Menggunakan merk mobil nyata
            'model' => $model, // Menggunakan model mobil nyata berdasarkan merk
            'tahun' => $this->faker->numberBetween(2000, 2024), // Tahun antara 2000 sampai 2024
            'harga_per_hari' => $this->faker->randomFloat(2, 200000, 1500000), // Harga sewa per hari antara 200 ribu hingga 1,5 juta
            'status' => $this->faker->randomElement(['tersedia', 'disewa']), // Status mobil
            'warna' => $this->faker->safeColorName(), // Menggunakan warna yang umum
            'nomor_polisi' => strtoupper($this->faker->bothify('? ### ??')), // Menggunakan format plat nomor polisi Indonesia
            'deskripsi' => $this->faker->realText(100), // Deskripsi dengan teks acak yang lebih panjang
        ];
    }
}
