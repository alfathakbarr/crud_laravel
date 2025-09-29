<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => ucfirst($this->faker->unique()->words(2, true)), //contoh
            'sks' => $this->faker->numberBetween(2, 4),
    //JANGAN BUAT SET 'dosen_id' SUPAYA TIDAK MEMBUAT DOSEN BARU OTOMATIS
        ];
    }
}
