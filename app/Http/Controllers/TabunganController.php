<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tabungan;
use App\Models\User;
use App\Models\Role;

class TabunganController extends Controller
{
    // Stor Tabungan --------------------------------------------------------------------------------
    public function index_stor(){
        $stor = Tabungan::All();
        $user = User::All();
        $role = Role::All();

        // Tabel Stor Tabungan --------------------------------
        $startDate = now()->startOfMonth(); // Mulai bulan ini
        $endDate = now()->endOfMonth(); // Akhir bulan ini
        $storTabel = Tabungan::whereBetween('created_at', [$startDate, $endDate])->paginate(30);

        // Total Tabungan -------------------------------------
        $hitungTotalSaldo = Tabungan::sum('jumlah_tabungan');

        // Total Stor Tabungan --------------------------------
        $hitungTotalStor = Tabungan::where('tipe_transaksi', 'Stor')->sum('jumlah');

        // Total Stor Tabungan Bulan Ini ----------------------
        $bulanIni = Carbon::now()->format('m');
        $bulanStor = Tabungan::whereMonth('created_at', $bulanIni)->where('tipe_transaksi', 'Stor')->sum('jumlah');

        // Total Stor Tabungan Minggu Ini ---------------------
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $mingguStor = Tabungan::where('tipe_transaksi', 'Stor')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('jumlah');

        // Total Stor Tabungan Hari Ini -----------------------
        $today = Carbon::today();
        $hariStor = Tabungan::whereDate('created_at', $today)->where('tipe_transaksi', 'Stor')->sum('jumlah');

        // Total Stor Kelas 1 A Hari Ini ----------------------
        $storKelas1A = Tabungan::where('kelas', '1A')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 1 B Hari Ini ----------------------
        $storKelas1B = Tabungan::where('kelas', '1B')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 2 A Hari Ini ----------------------
        $storKelas2A = Tabungan::where('kelas', '2A')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 2 B Hari Ini ----------------------
        $storKelas2B = Tabungan::where('kelas', '2B')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 3 A Hari Ini ----------------------
        $storKelas3A = Tabungan::where('kelas', '3A')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 3 B Hari Ini ----------------------
        $storKelas3B = Tabungan::where('kelas', '3B')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 4 Hari Ini ----------------------
        $storKelas4 = Tabungan::where('kelas', '4')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 5 Hari Ini ----------------------
        $storKelas5 = Tabungan::where('kelas', '5')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 6 Hari Ini ----------------------
        $storKelas6 = Tabungan::where('kelas', '6')->whereDate('created_at', $today)->sum('jumlah');

        // Generate Dropdown Id Tabungan --------------------
        $storTerbaru = [];
        for ($i = 0 ; $i < 1000 ; $i++){
            $coba = Tabungan::where('id_tabungan', 'KT'.$i )->latest('id')->first();
            if ($coba != null ) {
                $storTerbaru[$i] = $coba ;
            }
        }

        return view('petugas.kelolaStor',
        compact('storKelas1A','storKelas1B','storKelas2A','storKelas2B',
                'storKelas3A','storKelas3B','storKelas4','storKelas5',
                'storKelas6','storTabel',
                'storTerbaru','stor','user','role','hitungTotalSaldo',
                'hitungTotalStor','bulanStor','mingguStor','hariStor'));
    }
    public function stor_tabungan(Request $req){

        $tabungan = new Tabungan ;

        $tabungan->id_tabungan = $req->get('selectuser');
        $tabungan->nama = $req->get('nama');
        $tabungan->kelas = $req->get('kelas');
        $tabungan->roles_id = 3 ;
        $tabungan->tipe_transaksi = 'Stor';
        $tabungan->jumlah = $req->get('jumlah_stor');
        $tabungan->jumlah_tabungan = $req->get('jumlah_tabungan') + $tabungan->jumlah ;
        $tabungan->jumlah_dibuku = $req->get('jumlah_dibuku');
        $tabungan->premi = $tabungan->jumlah_tabungan * 0.05 ;
        $tabungan->sisa = $tabungan->jumlah - $tabungan->premi ;

        $tabungan->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('tabungan.stor')->with($notification);
    }

    // Tarik Tabungan -------------------------------------------------------------------------------
    public function index_tarik(){
        $tarik = Tabungan::All();
        return view('petugas.kelolaTarik', compact('tarik'));
    }
}
