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
            ],
            [
                'nama_status' => 'Honorer',
            ],
        ];

        StatusPegawai::insert($status);
    }
}
