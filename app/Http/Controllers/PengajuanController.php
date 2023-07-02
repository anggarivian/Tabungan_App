<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Pengajuan;
use App\Models\Tabungan;
use App\Models\User;

class PengajuanController extends Controller
{
    public function index(){
        $pengajuan = Pengajuan::All();
        return view('pengajuan.pengajuan', compact('pengajuan'));
    }

    public function siswa_index(){

        $pengajuan = Pengajuan::All();
        $user = Auth::user();
        $test = $user->id_tabungan ;

        // Ambil Data Dari Tabungan ----------------------------------------------------------------
        $data = Tabungan::where('id_tabungan', $test)->latest('created_at')->first();

        // Data Untuk Validasi ---------------------------------------------------------------------
        $validasi = Pengajuan::where('id_tabungan', $test)->latest()->first();

        if ($validasi) {
            $tanggalTerakhir = Carbon::parse($validasi->created_at);
            $tanggalSekarang = Carbon::now();
            $selisihHari = $tanggalTerakhir->diffInDays($tanggalSekarang);
        }

        return view('pengajuan.siswaPengajuan', compact('pengajuan','data','validasi','selisihHari'));
    }

    public function store(Request $req){

        $pengajuan = new Pengajuan;

        $pengajuan->id_tabungan = $req->get('id_tabungan');
        $pengajuan->nama = $req->get('nama');
        $pengajuan->kelas = $req->get('kelas');
        $pengajuan->jumlah_tabungan = $req->get('jumlah_tabungan');
        $pengajuan->jumlah_penarikan = $req->get('jumlah_tarik');
        $pengajuan->alasan = $req->get('alasan');
        $pengajuan->kelas = 'Pending';

        $pengajuan->save();

        $tabungan = new Tabungan ;

        $tabungan->id_tabungan = $req->get('id_tabungan');
        $tabungan->nama = $req->get('nama');
        $tabungan->kelas = $req->get('kelas');
        $tabungan->tipe_transaksi = 'Tarik';
        $tabungan->jumlah = $req->get('jumlah_tarik');
        $tabungan->jumlah_tabungan = $req->get('jumlah_tabungan') - $tabungan->jumlah ;
        $tabungan->jumlah_dibuku = $req->get('jumlah_dibuku');
        $tabungan->premi = $tabungan->jumlah_tabungan * 0.05 ;
        $tabungan->sisa = $tabungan->jumlah_tabungan - $tabungan->premi ;

        $tabungan->save();

        $notification = array(
            'message' =>'Data Siswa berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('siswa.pengajuan')->with($notification);
    }
}
