<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = [
            [
                'nama_area' => 'MEDIKAL BEDAH',
            ],
            [
                'nama_area' => 'MATERNITAS',
            ],
            [
                'nama_area' => 'ANAK',
            ],
            [
                'nama_area' => 'GAWAT DARURAT',
            ],
            [
                'nama_area' => 'KRITIS',
            ],
            [
                'nama_area' => 'KRITIS PICU/NICU',
            ],
            [
                'nama_area' => 'IPCN',
            ],
            [
                'nama_area' => 'KAMAR BEDAH',
            ],
            [
                'nama_area' => 'ANESTESI',
            ],
            [
                'nama_area' => 'POLIKLINIK',
            ],
            [
                'nama_area' => 'MEDIKAL BEDAH HAEMODIALISA',
            ],
            [
                'nama_area' => 'KEBIDANAN',
            ],
        ];

        Area::insert($area);
    }
}
