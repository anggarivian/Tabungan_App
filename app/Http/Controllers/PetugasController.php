<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Role;
use App\Models\Tabungan;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class PetugasController extends Controller
{
    // Kelola Siswa ---------------------------------------------------------------------------------------------------------------
        public function __construct(){
            $this->middleware('auth');
        }
        // Read Data Siswa --------------------------------------------------------------------------------------------------------
        public function index(){
            $user = User::All();
            $role = Role::All();
            $tabungan = Tabungan::All();
            $userSiswa = User::where('roles_id', '3')->get();
            return view('petugas.kelolaSiswa', compact('user','role','userSiswa'));
        }
        // Create Data Siswa + Tabungan -------------------------------------------------------------------------------------------
        public function store(Request $req){
            $user = new User;
            $validate = $req->validate([
                'nama' => 'required|max:255',
                'email' => 'required',
                'kontak' => 'required',
                'password' => 'required',
                'kelas' => 'required',
                'orang_tua' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
            ]);
            $user->id_tabungan = $req->get('id_tabungan');
            $user->nama = $req->get('nama');
            $user->email = $req->get('email');
            $user->kontak = $req->get('kontak');
            $user->orang_tua = $req->get('orang_tua');
            $user->alamat = $req->get('alamat');
            $user->jenis_kelamin =  $req->get('jenis_kelamin');
            $user->kelas = $req->get('kelas');
            $user->password = Hash::make($req->get('password'));
            $user->roles_id = 3 ;
            $user->save();
            // Create Data Tabungan ------------------------------------------------------------------------------------------------
            $tabungan = new Tabungan;
            $tabungan->id_tabungan = $req->get('id_tabungan');
            $tabungan->nama = $req->get('nama');
            $tabungan->kelas = $req->get('kelas');
            $tabungan->roles_id = 3 ;
            $tabungan->save();
            $notification = array(
                'message' =>'Data Siswa berhasil ditambahkan', 'alert-type' =>'success'
            );
            return redirect()->route('siswa')->with($notification);
        }
        // Edit Data Siswa + Tabungan ----------------------------------------------------------------------------------------------
        public function edit(Request $req){
            $user = User::find($req->get('id'));

            $validate = $req->validate([
                'nama' => 'required|max:255',
                'email' => 'required',
                'kontak' => 'required',
                'kelas' => 'required',
                'orang_tua' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
            ]);
            $user->id_tabungan = $req->get('id_tabungan');
            $user->nama = $req->get('nama');
            $user->email = $req->get('email');
            $user->kontak = $req->get('kontak');
            $user->kelas = $req->get('kelas');
            $user->orang_tua = $req->get('orang_tua');
            $user->alamat = $req->get('alamat');
            $user->jenis_kelamin =  $req->get('jenis_kelamin');
            $user->kelas = $req->get('kelas');
            $user->roles_id = 3 ;
            $user->save();
            // Edit Data Tabungan ----------------------------------------------------------------------------------------------------
            $idTabungan = $req->get('id_tabungan');
            $namaBaru = $req->get('nama');
            $kelasBaru = $req->get('kelas');
            Tabungan::where('id_tabungan', $idTabungan)->update(['nama' => $namaBaru]);
            Tabungan::where('id_tabungan', $idTabungan)->update(['kelas' => $kelasBaru]);
            $notification = array(
                'message' => 'Data Siswa berhasil diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('siswa')->with($notification);
        }
        // Delete Data Siswa + Tabungan ---------------------------------------------------------------------------------------------
        public function destroy(Request $req, $id){
            $user = User::find($id);
            $user->delete();
            Tabungan::where('id_tabungan', $user->id_tabungan)->delete();
            $notification = array(
                'message' => 'Data Siswa berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('siswa')->with($notification);
        }
        // Laporan Data Siswa  --------------------------------------------------------------------------------------------------
        public function laporan(){
            $user = User::all();
            $userSiswa = User::where('roles_id', '3')->get();
            return view('laporan.laporanSiswa', compact('user','userSiswa'));
        }
        // Export Data Siswa PDF ------------------------------------------------------------------------------------------------
        public function exportpdf(){
            $user = User::where('roles_id', '3')->get();
            view()->share('user', $user);
            $pdf = PDF::loadview('export.siswa');
            return $pdf->download('data_siswa.pdf');
        }
        // Export Data Siswa Excel ------------------------------------------------------------------------------------------- Error
        public function exportexcel(){
            return Excel::download(new SiswaExport, 'datasiswa.xlsx');
        }
        // Import Data Siswa Excel -------------------------------------------------------------------------------------------------
        public function importexcel(Request $req){
            $data = $req->file('file');
            $namafile = $data->getClientOriginalName();
            $data->move('SiswaData',  $namafile);
            Excel::import(new  SiswaImport, \public_path('/SiswaData/'.$namafile));
            return \redirect()->back();
        }
}
