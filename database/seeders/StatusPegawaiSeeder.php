<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusPegawai;

class StatusPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'nama_status' => 'PNS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Honorer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        StatusPegawai::insert($status);
    }
}
