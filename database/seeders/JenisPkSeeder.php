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
            ],
            [
                'nama_pk' => 'PK 2',
            ],
            [
                'nama_pk' => 'PK 3',
            ],
            [
                'nama_pk' => 'PK 4',
            ],
            [
                'nama_pk' => 'PK 5',
            ],
            [
                'nama_pk' => 'PK 1 Pendampingan',
            ],
            [
                'nama_pk' => 'Pra PK',
            ],
        ];

        JenisPk::insert($jenis_pk);
    }
}
