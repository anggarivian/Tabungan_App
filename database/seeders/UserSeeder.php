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
                'id'                => 1,
                'nama'              => 'Admin',
                'email'             => 'admin@mail.com',
                'jenis_kelamin'     => 'Laki',
                'kelas'             => '-',
                'kontak'            => '086734676654',
                'password'          => bcrypt('12345'),
                'roles_id'          => 1,
                'id_tabungan'       => 'admin',
            ],
            [
                'id'                => 2,
                'nama'              => 'Petugas',
                'email'             => 'petugas@mail.com',
                'jenis_kelamin'     => 'Laki',
                'kelas'             => '-',
                'kontak'            => '081248439240',
                'password'          => bcrypt('12345'),
                'roles_id'          => 2,
                'id_tabungan'       => 'ptgas',
            ],
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}