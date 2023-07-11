<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesi;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesi = [
            [
                'nama_profesi' => 'Perawat',
            ],
            [
                'nama_profesi' => 'Bidan',
            ],
            [
                'nama_profesi' => 'Perawat Gigi',
            ],
        ];

        Profesi::insert($profesi);
    }
}
