<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'nama'=>'Admin',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('admin@123'),
               'whatsapp'=>'6285823670112',
            ],
            [
               'nama'=>'Super Admin',
               'email'=>'superadmin@gmail.com',
               'type'=>2,
               'password'=> bcrypt('superadmin@123'),
               'whatsapp'=>'6282145380579',
            ],
            [
               'nama'=>'Perawat',
               'email'=>'perawat@gmail.com',
               'type'=>0,
               'password'=> bcrypt('perawat@123'),
               'whatsapp'=>'6285824678340',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
