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
                'username'          => 'Admin',
                'email'             => 'admin@mail.com',
                'jenis_kelamin'     => 'Laki',
                'kelas'             => '-',
                'kontak'            => '086734676654',
                'password'          => bcrypt('12345'),
                'roles_id'          => 1
            ],
            [
                'nama'              => 'Petugas',
                'username'          => 'Petugas',
                'email'             => 'petugas@mail.com',
                'jenis_kelamin'     => 'Laki',
                'kelas'             => '-',
                'kontak'            => '081248439240',
                'password'          => bcrypt('12345'),
                'roles_id'          => 2
            ],
            [
                'nama'              => 'Siswa',
                'username'          => 'Siswa',
                'email'             => 'siswa@mail.com',
                'jenis_kelamin'     => 'Laki',
                'kelas'             => '2C',
                'kontak'            => '085798888834',
                'orang_tua'         => 'Jhon Cena',
                'alamat'            => 'Kp. Parabon Desa Sukarame',
                'password'          => bcrypt('12345'),
                'roles_id'          => 3
            ]
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}