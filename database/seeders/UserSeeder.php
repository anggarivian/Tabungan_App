<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama'              => 'Admin',
                'email'             => 'admin@mail.com',
                'jenis_kelamin'     => 'Laki',
                'password'          => bcrypt('12345'),
                'roles_id'          => 1
            ],
            [
                'nama'              => 'Petugas',
                'email'             => 'petugas@mail.com',
                'jenis_kelamin'     => 'Laki',
                'password'          => bcrypt('12345'),
                'roles_id'          => 2
            ],
            [
                'nama'              => 'Siswa',
                'email'             => 'siswa@mail.com',
                'jenis_kelamin'     => 'Laki',
                'kontak'            => '085798888834',
                'password'          => bcrypt('12345'),
                'roles_id'          => 3
            ]
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}