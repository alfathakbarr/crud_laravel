<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\MataKuliah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 10 Dosen
        $dosens = Dosen::factory(10)->create();

        // Buat 50 MataKuliah dan assign ke Dosen secara acak
        MataKuliah::factory(50)->make()->each(function ($mk) use ($dosens) {
            $mk->dosen_id = $dosens->random()->id;
            $mk->save();
        });
    }
}
