<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tabungan;
use App\Models\User;
use App\Models\Role;

class TabunganController extends Controller
{
    // Stor Tabungan ----------------------------------------------------------------------------------------------------------------
    public function index_stor(){
        $stor = Tabungan::All();
        $user = User::All();
        $role = Role::All();

        // Tabel Stor Tabungan --------------------------------
        $startDate = now()->startOfMonth(); // Mulai bulan ini
        $endDate = now()->endOfMonth(); // Akhir bulan ini
        $storTabel = Tabungan::whereBetween('created_at', [$startDate, $endDate])->where('tipe_transaksi', 'Stor')->paginate(30);

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
        $storKelas1A = Tabungan::where('kelas', '1A')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 1 B Hari Ini ----------------------
        $storKelas1B = Tabungan::where('kelas', '1B')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 2 A Hari Ini ----------------------
        $storKelas2A = Tabungan::where('kelas', '2A')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 2 B Hari Ini ----------------------
        $storKelas2B = Tabungan::where('kelas', '2B')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 3 A Hari Ini ----------------------
        $storKelas3A = Tabungan::where('kelas', '3A')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 3 B Hari Ini ----------------------
        $storKelas3B = Tabungan::where('kelas', '3B')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 4 Hari Ini ----------------------
        $storKelas4 = Tabungan::where('kelas', '4')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 5 Hari Ini ----------------------
        $storKelas5 = Tabungan::where('kelas', '5')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

        // Total Stor Kelas 6 Hari Ini ----------------------
        $storKelas6 = Tabungan::where('kelas', '6')->where('tipe_transaksi', 'Stor')->whereDate('created_at', $today)->sum('jumlah');

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

    // Tarik Tabungan ----------------------------------------------------------------------------------------------------------------
    public function index_tarik(){
        $tarik = Tabungan::All();
        $user = User::All();
        $role = Role::All();

        // Tabel Tarik Tabungan --------------------------------
        $startDate = now()->startOfMonth(); // Mulai bulan ini
        $endDate = now()->endOfMonth(); // Akhir bulan ini
        $tarikTabel = Tabungan::whereBetween('created_at', [$startDate, $endDate])->where('tipe_transaksi', 'Tarik')->paginate(30);

        // Total Tabungan -------------------------------------
        $hitungTotalSaldo = Tabungan::sum('jumlah_tabungan');

        // Total Tarik Tabungan --------------------------------
        $hitungTotalTarik = Tabungan::where('tipe_transaksi', 'Tarik')->sum('jumlah');

        // Total Tarik Tabungan Bulan Ini ----------------------
        $bulanIni = Carbon::now()->format('m');
        $bulanTarik = Tabungan::whereMonth('created_at', $bulanIni)->where('tipe_transaksi', 'Tarik')->sum('jumlah');

        // Total Tarik Tabungan Minggu Ini ---------------------
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $mingguTarik = Tabungan::where('tipe_transaksi', 'Tarik')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('jumlah');

        // Total Tarik Tabungan Hari Ini -----------------------
        $today = Carbon::today();
        $hariTarik = Tabungan::whereDate('created_at', $today)->where('tipe_transaksi', 'Tarik')->sum('jumlah');

        // Total Tarik Kelas 1 A Hari Ini ----------------------
        $tarikKelas1A = Tabungan::where('kelas', '1A')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 1 B Hari Ini ----------------------
        $tarikKelas1B = Tabungan::where('kelas', '1B')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 2 A Hari Ini ----------------------
        $tarikKelas2A = Tabungan::where('kelas', '2A')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 2 B Hari Ini ----------------------
        $tarikKelas2B = Tabungan::where('kelas', '2B')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 3 A Hari Ini ----------------------
        $tarikKelas3A = Tabungan::where('kelas', '3A')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 3 B Hari Ini ----------------------
        $tarikKelas3B = Tabungan::where('kelas', '3B')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 4 Hari Ini ----------------------
        $tarikKelas4 = Tabungan::where('kelas', '4')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 5 Hari Ini ----------------------
        $tarikKelas5 = Tabungan::where('kelas', '5')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Total Tarik Kelas 6 Hari Ini ----------------------
        $tarikKelas6 = Tabungan::where('kelas', '6')->where('tipe_transaksi', 'Tarik')->whereDate('created_at', $today)->sum('jumlah');

        // Generate Dropdown Id Tabungan --------------------
        $tarikTerbaru = [];
        for ($i = 0 ; $i < 1000 ; $i++){
            $coba = Tabungan::where('id_tabungan', 'KT'.$i )->latest('id')->first();
            if ($coba != null ) {
                $tarikTerbaru[$i] = $coba ;
            }
        }

        return view('petugas.kelolaTarik',
        compact('tarikKelas1A','tarikKelas1B','tarikKelas2A','tarikKelas2B',
                'tarikKelas3A','tarikKelas3B','tarikKelas4','tarikKelas5',
                'tarikKelas6','tarikTabel',
                'tarikTerbaru','tarik','user','role','hitungTotalSaldo',
                'hitungTotalTarik','bulanTarik','mingguTarik','hariTarik'));
    }


    public function tarik_tabungan(Request $req){

        $tabungan = new Tabungan ;

        $tabungan->id_tabungan = $req->get('selectuser');
        $tabungan->nama = $req->get('nama');
        $tabungan->kelas = $req->get('kelas');
        $tabungan->roles_id = 3 ;
        $tabungan->tipe_transaksi = 'Tarik';
        $tabungan->jumlah = $req->get('jumlah_tarik');
        $tabungan->jumlah_tabungan = $req->get('jumlah_tabungan') - $tabungan->jumlah ;
        $tabungan->jumlah_dibuku = $req->get('jumlah_dibuku');
        $tabungan->premi = $tabungan->jumlah_tabungan * 0.05 ;
        $tabungan->sisa = $tabungan->jumlah - $tabungan->premi ;

        $tabungan->save();

        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('tabungan.tarik')->with($notification);
    }
}
