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
    // Read Data Pengajuan -------------------------------------------------------------------------------------------------------
    public function index(){
        $pengajuan = Pengajuan::All();
        return view('pengajuan.pengajuan', compact('pengajuan'));
    }
    public function siswa_index(){
        $pengajuan = Pengajuan::All();
        $user = Auth::user();
        $test = $user->id_tabungan ;
        // Ambil Data Dari Tabungan -----------------------------------------------------------------------------------------------
        $data = Tabungan::where('id_tabungan', $test)->latest('created_at')->first();
        $cekData = Pengajuan::count();
        return view('pengajuan.siswaPengajuan', compact('pengajuan','data','cekData'));
    }
    // Read Data Siswa + Tabungan -------------------------------------------------------------------------------------------------
    public function riwayat(Request $req){
        $tabungan = Tabungan::All();
        $user = Auth::user();
        $test = $user->id_tabungan ;
        // Ambil Data Dari Tabungan ----------------------------------------------------------------------------------------------
        $data = Tabungan::where('id_tabungan', $test)->latest('created_at')->first();

        $startDate = now()->startOfMonth(); // Mulai bulan ini
        $endDate = now()->endOfMonth(); // Akhir bulan ini
        $tabel = Tabungan::whereBetween('created_at', [$startDate, $endDate])->where('id_tabungan', $test )->paginate(30);
        return view('siswa.riwayat', compact('tabungan', 'tabel','data'));
    }
    // Crate Data Pengajuan -------------------------------------------------------------------------------------------------------
    public function store(Request $req){
        $pengajuan = new Pengajuan;
        $pengajuan->id_tabungan = $req->get('id_tabungan');
        $pengajuan->nama = $req->get('nama');
        $pengajuan->kelas = $req->get('kelas');
        $pengajuan->jumlah_tabungan = $req->get('jumlah_tabungan');
        $pengajuan->jumlah_penarikan = $req->get('jumlah_tarik');
        $pengajuan->alasan = $req->get('alasan');
        $pengajuan->status = 'Diproses';
        $pengajuan->save();
        $notification = array(
            'message' =>'Penarikan Berhasil Diajukan', 'alert-type' =>'success'
        );
        return redirect()->route('siswa.pengajuan')->with($notification);
    }
    // Ambil Data Pengajuan -------------------------------------------------------------------------------------------------------
    public function getDataPengajuan($id){
        $pengajuan = Pengajuan::find($id);
        return response()->json($pengajuan);
    }
    // Proses Setuju Pengajuan ------------------------------------------------------------------------------------------------ Demo
    public function setuju(Request $req){
        $pengajuan = Pengajuan::find($req->get('id'));
        $pengajuan->id_tabungan = $req->get('id_tabungan');
        $pengajuan->nama = $req->get('nama');
        $pengajuan->kelas = $req->get('kelas');
        $pengajuan->jumlah_tabungan = $req->get('jumlah_tabungan');
        $pengajuan->jumlah_penarikan = $req->get('jumlah_penarikan');
        $pengajuan->alasan = $req->get('alasan');
        $pengajuan->status = 'Disetujui';
        $pengajuan->save();
        // Lakukan Tarik Tabungan  ------------------------------------------------------------------------------------------------
        $tabungan = new Tabungan ;
        $tabungan->id_tabungan = $req->get('id_tabungan');
        $tabungan->nama = $req->get('nama');
        $tabungan->kelas = $req->get('kelas');
        $tabungan->roles_id = 3 ;
        $tabungan->tipe_transaksi = 'Tarik';
        $tabungan->jumlah = $req->get('jumlah_penarikan');
        $tabungan->saldo_akhir = $req->get('jumlah_tabungan') - $tabungan->jumlah ;
        $tabungan->premi = $tabungan->saldo_akhir * 0.05 ;
        $tabungan->sisa = $tabungan->saldo_akhir - $tabungan->premi ;
        $tabungan->save();
        $notification = array(
            'message' =>'Data Siswa berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('pengajuan')->with($notification);
    }
    // Proses Tolak Pengajuan ----------------------------------------------------------------------------------------------- Demo
    public function tolak($id){
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();
        $notification = array(
            'message' =>'Pengajuan Telah di Tolak', 'alert-type' =>'success'
        );
        return redirect()->route('pengajuan')->with($notification);
    }
    // Laporan Data Pengajuan  -------------------------------------------------------------------------------------------------------
    public function laporan(){
        $user = User::all();
        $userPengajuan = User::where('roles_id', '3')->get();
        return view('laporan.laporanPengajuan', compact('user','userPengajuan'));
    }
    // Export Data Pengajuan PDF ----------------------------------------------------------------------------------------------------
    public function exportpdf(){
        $user = User::where('roles_id', '3')->get();
        view()->share('user', $user);
        $pdf = PDF::loadview('export.pengajuan');
        return $pdf->download('data_pengajuan.pdf');
    }
    // Export Data Pengajuan Excel ------------------------------------------------------------------------------------------- Error
    public function exportexcel(){
        return Excel::download(new PengajuanExport, 'datapengajuan.xlsx');
    }
}
