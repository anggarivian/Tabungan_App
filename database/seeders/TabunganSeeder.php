<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tabungan;

class TabunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tabungans = [
            [
                'users_id'          => 1,
                'nama'              => 'Siswa',
                'kelas'             => '4',
                'jumlah_tabungan'   => 0,
                'tipe_transaksi'    => 'Stor',
                'jumlah_dibuku'     => 0,
                'jumlah'            => 0,
                'premi'             => 0.05,
                'sisa'              => 0
            ],
        ];
        foreach ($tabungans as $key => $tabungan){
            Tabungan::create($tabungan);
        }
    }
}
