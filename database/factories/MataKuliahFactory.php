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
        static $number = 1;
        return [
            'kode_mk' => 'MK' . str_pad($number++, 3, '0', STR_PAD_LEFT),
            'nama' => ucfirst($this->faker->unique()->words(2, true)),
            'sks' => $this->faker->numberBetween(2, 4),
        ];
    }
}
