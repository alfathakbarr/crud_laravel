<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosens = [
            [
                'nama' => 'Dr. Budi Santoso',
                'nip' => '198501152010011001',
                'email' => 'budi.santoso@university.edu',
                'no_telepon' => '081234567801'
            ],
            [
                'nama' => 'Prof. Dr. Siti Rahayu',
                'nip' => '198603222011012002',
                'email' => 'siti.rahayu@university.edu',
                'no_telepon' => '081234567802'
            ],
            [
                'nama' => 'Dr. Ahmad Hidayat',
                'nip' => '198707132012012003',
                'email' => 'ahmad.hidayat@university.edu',
                'no_telepon' => '081234567803'
            ],
            [
                'nama' => 'Dr. Sri Wahyuni',
                'nip' => '198809242013012004',
                'email' => 'sri.wahyuni@university.edu',
                'no_telepon' => '081234567804'
            ],
            [
                'nama' => 'Prof. Dr. Hadi Wijaya',
                'nip' => '198911052014011005',
                'email' => 'hadi.wijaya@university.edu',
                'no_telepon' => '081234567805'
            ],
            [
                'nama' => 'Dr. Rina Anggraini',
                'nip' => '199001162015012006',
                'email' => 'rina.anggraini@university.edu',
                'no_telepon' => '081234567806'
            ],
            [
                'nama' => 'Prof. Dr. Agus Susanto',
                'nip' => '199103272016011007',
                'email' => 'agus.susanto@university.edu',
                'no_telepon' => '081234567807'
            ],
            [
                'nama' => 'Dr. Dewi Lestari',
                'nip' => '199205082017012008',
                'email' => 'dewi.lestari@university.edu',
                'no_telepon' => '081234567808'
            ],
            [
                'nama' => 'Prof. Dr. Bambang Kurniawan',
                'nip' => '199307192018011009',
                'email' => 'bambang.kurniawan@university.edu',
                'no_telepon' => '081234567809'
            ],
            [
                'nama' => 'Dr. Maya Putri',
                'nip' => '199409302019012010',
                'email' => 'maya.putri@university.edu',
                'no_telepon' => '081234567810'
            ]
        ];

        foreach ($dosens as $dosen) {
            \App\Models\Dosen::create($dosen);
        }
    }
}
