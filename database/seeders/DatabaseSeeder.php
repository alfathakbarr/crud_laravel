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
        // Seed Dosen terlebih dahulu
        $this->call(DosenSeeder::class);
        
        // Get all dosen for reference
        $dosens = Dosen::all();

        // Buat 50 MataKuliah dan assign ke Dosen yang sudah ada
        MataKuliah::factory(50)->make()->each(function ($mk) use ($dosens) {
            $mk->dosen_id = $dosens->random()->id;
            $mk->save();
        });
    }
}
