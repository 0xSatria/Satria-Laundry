<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'nama' => 'Admin',
                'username' => 'admin1',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('a'),
                'remember_token' => Str::random(10),
                'id_outlet' => 1,
                'role' => 'Admin'
            ],
            [
                'nama' => 'Owner',
                'username' => 'The Boss',
                'email' => 'owner@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('a'),
                'remember_token' => Str::random(10),
                'id_outlet' => 1,
                'role' => 'Owner'
            ],
            [
                'nama' => 'Kasir',
                'username' => 'kasir1',
                'email' => 'kasir@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('a'),
                'remember_token' => Str::random(10),
                'id_outlet' => 1,
                'role' => 'Kasir'
            ]
        ];
        DB::table('users')->insert($users);
    }
}
