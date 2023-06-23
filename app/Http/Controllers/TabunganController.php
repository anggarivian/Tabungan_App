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

        return view('petugas.kelolaStor', compact('stor','user','role','hitungTotalSaldo','hitungTotalStor','bulanStor','mingguStor','hariStor'));
    }
    public function stor_tabungan(Request $req){
        $tabungan = new Tabungan;

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'kelas' => 'required',
            'jumlah_tabungan' => 'required',
            'jumlah_dibuku' => 'required',
        ]);

        $tabungan->users_id = $req->get('users_id');
        $tabungan->tipe_transaksi = 'Stor';
        $tabungan->jumlah_tabungan = $req->get('jumlah_tabungan') + $req->get('jumlah_stor');
        $tabungan->jumlah_dibuku = $req->get('jumlah_dibuku');
        $tabungan->jumlah = $req->get('jumlah_stor') ;
        $tabungan->premi = $tabungan->jumlah_tabungan * 0.05 ;
        $tabungan->sisa = $tabungan->jumlah_tabungan - $tabungan->premi ;

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
