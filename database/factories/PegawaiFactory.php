<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'jabatan' => fake()->randomElement(['Staf Gudang', 'Kepala Gudang', 'Admin Gudang', 'Kurir']),
            'email' => fake()->unique()->safeEmail(),
            'nomor_telepon' => fake()->numerify('08##########'),
            'alamat' => fake()->address(),
        ];
    }
}
