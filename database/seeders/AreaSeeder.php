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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'MATERNITAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'ANAK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'GAWAT DARURAT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'KRITIS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'KRITIS PICU/NICU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'IPCN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'KAMAR BEDAH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'ANESTESI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'POLIKLINIK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'MEDIKAL BEDAH HAEMODIALISA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_area' => 'KEBIDANAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Area::insert($area);
    }
}
