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
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('admin@123'),
            ],
            [
               'name'=>'Super Admin',
               'email'=>'superadmin@gmail.com',
               'type'=>2,
               'password'=> bcrypt('superadmin@123'),
            ],
            [
               'name'=>'Perawat',
               'email'=>'perawat@gmail.com',
               'type'=>0,
               'password'=> bcrypt('perawat@123'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
