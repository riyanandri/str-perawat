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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_profesi' => 'Bidan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_profesi' => 'Perawat Gigi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Profesi::insert($profesi);
    }
}
