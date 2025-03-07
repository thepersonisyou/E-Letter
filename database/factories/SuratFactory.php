<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10), // Sesuaikan dengan jumlah user di database
            'pengirim' => $this->faker->name(),
            'nomor_surat' => 'SURAT-' . $this->faker->unique()->numerify('#####'),
            'tanggal_surat' => $this->faker->date(),
            'tanggal_diterima' => $this->faker->date(),
            'perihal' => $this->faker->sentence(3),
            'asal_surat' => $this->faker->city(),
            'file_surat' => 'file-surat/' . Str::random(10) . '.pdf',
            'departemen' => $this->faker->randomElement(['HR', 'Finance', 'IT', 'Marketing']),
            'tipe_surat' => $this->faker->randomElement(['Surat Masuk', 'Surat Keluar']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
