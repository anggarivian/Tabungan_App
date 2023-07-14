<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $hitungTotalSaldo = Tabungan::sum('saldo_akhir');
        $dataTerbaru = DB::table('tabungans')->select('id', 'id_tabungan', 'saldo_akhir')->whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))->from('tabungans')->groupBy('id_tabungan');
        })->get();

        $totalJumlahTabungan = 0;
        foreach ($dataTerbaru as $data) {
            $totalJumlahTabungan += $data->saldo_akhir;
        }

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

        // Total Per Kelas Stor Tabungan Hari Ini -----------------------
        $today = Carbon::today();
        $kelasList = ['1A', '1B', '2A', '2B', '3A', '3B', '4', '5', '6'];
        $totalStorHariIni = [];

        foreach ($kelasList as $kelas) {
            $totalStorHariIni[$kelas] = Tabungan::where('kelas', $kelas)
                ->where('tipe_transaksi', 'Stor')
                ->whereDate('created_at', $today)
                ->sum('jumlah');
        }

        // Generate Dropdown NISN --------------------
        $storTerbaru = [];
        $result = [];
        $result2 = [];
        $ambilDataTerakhir = Tabungan::pluck('id_tabungan');

        foreach ($ambilDataTerakhir as $index => $value) {
            $result[$value] = $index;
        }
        foreach ($result as $index => $value) {
            $result2[$value] = $index;
        }
        foreach ($result2 as $index => $value) {
            $storTerbaru[$value] = Tabungan::where('id_tabungan', $value )->latest('id')->first();
        }

        return view('petugas.kelolaStor', compact('storTabel','totalJumlahTabungan','totalStorHariIni','kelasList','storTerbaru','stor','user','role',
                                                    'hitungTotalSaldo','hitungTotalStor','bulanStor','mingguStor','hariStor'));
    }


    public function stor_tabungan(Request $req){

        $tabungan = new Tabungan ;

        $tabungan->id_tabungan = $req->get('selectuser');
        $tabungan->nama = $req->get('nama');
        $tabungan->kelas = $req->get('kelas');
        $tabungan->roles_id = 3 ;
        $tabungan->tipe_transaksi = 'Stor';
        $tabungan->jumlah = $req->get('jumlah_stor');
        $tabungan->saldo_awal = $req->get('jumlah_tabungan');
        $tabungan->saldo_akhir = $tabungan->saldo_awal + $tabungan->jumlah ;
        $tabungan->premi = $tabungan->saldo_akhir * 0.05 ;
        $tabungan->sisa = $tabungan->saldo_akhir - $tabungan->premi ;

        $tabungan->save();

        $notification = array(
            'message' => 'Transaksi Stor Tabungan Berhasil',
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
        $hitungTotalSaldo = Tabungan::sum('saldo_akhir');
        $dataTerbaru = DB::table('tabungans')->select('id', 'id_tabungan', 'saldo_akhir')->whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))->from('tabungans')->groupBy('id_tabungan');
        })->get();

        $totalJumlahTabungan = 0;
        foreach ($dataTerbaru as $data) {
            $totalJumlahTabungan += $data->saldo_akhir;
        }

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

        // Total Per Kelas Tarik Tabungan Hari Ini -----------------------
        $today = Carbon::today();
        $kelasList = ['1A', '1B', '2A', '2B', '3A', '3B', '4', '5', '6'];
        $totalTarikHariIni = [];

        foreach ($kelasList as $kelas) {
            $totalTarikHariIni[$kelas] = Tabungan::where('kelas', $kelas)
                ->where('tipe_transaksi', 'Tarik')
                ->whereDate('created_at', $today)
                ->sum('jumlah');
        }

        // Generate Dropdown NISN --------------------
        $tarikTerbaru = [];
        $result = [];
        $result2 = [];
        $ambilDataTerakhir = Tabungan::pluck('id_tabungan');

        foreach ($ambilDataTerakhir as $index => $value) {
            $result[$value] = $index;
        }
        foreach ($result as $index => $value) {
            $result2[$value] = $index;
        }
        foreach ($result2 as $index => $value) {
            $tarikTerbaru[$value] = Tabungan::where('id_tabungan', $value )->latest('id')->first();
        }

        return view('petugas.kelolaTarik', compact('tarikTabel','totalJumlahTabungan','totalTarikHariIni','kelasList','tarikTerbaru','tarik','user','role',
                                                    'hitungTotalSaldo','hitungTotalTarik','bulanTarik','mingguTarik','hariTarik'));
    }


    public function tarik_tabungan(Request $req){

        $tabungan = new Tabungan ;

        $tabungan->id_tabungan = $req->get('selectuser');
        $tabungan->nama = $req->get('nama');
        $tabungan->kelas = $req->get('kelas');
        $tabungan->roles_id = 3 ;
        $tabungan->tipe_transaksi = 'Tarik';
        $tabungan->jumlah = $req->get('jumlah_tarik');
        $tabungan->saldo_awal = $req->get('jumlah_tabungan');
        $tabungan->saldo_akhir = $tabungan->saldo_awal - $tabungan->jumlah ;
        $tabungan->premi = $tabungan->saldo_akhir * 0.05 ;
        $tabungan->sisa = $tabungan->saldo_akhir - $tabungan->premi ;

        $tabungan->save();

        $notification = array(
            'message' => 'Transaksi Tarik Tabungan Berhasil',
            'alert-type' => 'success'
        );
        return redirect()->route('tabungan.tarik')->with($notification);
    }
}
