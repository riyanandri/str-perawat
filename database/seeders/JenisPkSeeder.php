<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisPk;

class JenisPkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_pk = [
            [
                'nama_pk' => 'PK 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pk' => 'PK 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pk' => 'PK 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pk' => 'PK 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pk' => 'PK 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pk' => 'PK 1 Pendampingan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pk' => 'Pra PK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        JenisPk::insert($jenis_pk);
    }
}
