<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->unique()->words(3, true),
            'kategori' => fake()->randomElement(['Kemasan', 'Perlengkapan', 'APD', 'Logistik', 'Elektronik']),
            'satuan' => fake()->randomElement(['pcs', 'unit', 'roll', 'box', 'kg']),
            'lokasi_rak' => 'Rak '.fake()->randomLetter().fake()->numberBetween(1, 9),
            'stok' => fake()->numberBetween(0, 500),
        ];
    }
}
