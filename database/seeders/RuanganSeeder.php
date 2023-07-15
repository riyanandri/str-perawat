<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangan = [
            [
                'nama_ruang' => 'ALAMANDA 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ALAMANDA 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ANYELIR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ASTER 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ASTER 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ASTER 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ASTER 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ASTER 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'BOUGENVILE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'CEMPAKA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'CSSD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'DAHLIA 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'DAHLIA 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'DAHLIA 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'DAHLIA 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'DAHLIA 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'EDELWEIS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'FLAMBOYAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'GLADIOL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'HD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'IBS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'ICU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'IGD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'MPP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'PICU/NICU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'POLIKLINIK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'PPI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'VK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Ruangan::insert($ruangan);
    }
}
