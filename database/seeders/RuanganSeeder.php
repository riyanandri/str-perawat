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
            ],
            [
                'nama_ruang' => 'ALAMANDA 2',
            ],
            [
                'nama_ruang' => 'ANYELIR',
            ],
            [
                'nama_ruang' => 'ASTER 2',
            ],
            [
                'nama_ruang' => 'ASTER 3',
            ],
            [
                'nama_ruang' => 'ASTER 4',
            ],
            [
                'nama_ruang' => 'ASTER 5',
            ],
            [
                'nama_ruang' => 'ASTER 6',
            ],
            [
                'nama_ruang' => 'BOUGENVILE',
            ],
            [
                'nama_ruang' => 'CEMPAKA',
            ],
            [
                'nama_ruang' => 'CSSD',
            ],
            [
                'nama_ruang' => 'DAHLIA 1',
            ],
            [
                'nama_ruang' => 'DAHLIA 2',
            ],
            [
                'nama_ruang' => 'DAHLIA 3',
            ],
            [
                'nama_ruang' => 'DAHLIA 4',
            ],
            [
                'nama_ruang' => 'DAHLIA 5',
            ],
            [
                'nama_ruang' => 'EDELWEIS',
            ],
            [
                'nama_ruang' => 'FLAMBOYAN',
            ],
            [
                'nama_ruang' => 'GLADIOL',
            ],
            [
                'nama_ruang' => 'HD',
            ],
            [
                'nama_ruang' => 'IBS',
            ],
            [
                'nama_ruang' => 'ICU',
            ],
            [
                'nama_ruang' => 'IGD',
            ],
            [
                'nama_ruang' => 'MPP',
            ],
            [
                'nama_ruang' => 'PICU/NICU',
            ],
            [
                'nama_ruang' => 'POLIKLINIK',
            ],
            [
                'nama_ruang' => 'PPI',
            ],
            [
                'nama_ruang' => 'VK',
            ],
        ];

        Ruangan::insert($ruangan);
    }
}
