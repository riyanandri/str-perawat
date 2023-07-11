<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pendidikan;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendidikan = [
            [
                'pendidikan' => 'D3'
            ],
            [
                'pendidikan' => 'D4'
            ],
            [
                'pendidikan' => 'S1'
            ],
            [
                'pendidikan' => 'Ners'
            ],
        ];

        Pendidikan::insert($pendidikan);
    }
}
