<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Role;
use App\Models\Tabungan;

class PetugasController extends Controller
{
    // Kelola Siswa --------------------------------
        public function __construct(){
            $this->middleware('auth');
        }
        public function index(){
            $user = User::All();
            $role = Role::All();
            $tabungan = Tabungan::All();

            // Kode Tabungan Otomatis
            $cek = User::count();
            if ($cek == 0) {
                $urut = 001;
                $nomer = 'KT' . $urut;
            } else {
                $ambil = User::all()->last();
                $urut = (int)substr($ambil->id_tabungan, -3) + 1;
                $nomer = 'KT' . $urut;
            }

            return view('petugas.kelolaSiswa', compact('user','role','nomer'));
        }
        public function laporan(){
            $user = User::All();
            $role = Role::All();
            return view('laporan.laporanSiswa', compact('user','role'));
        }
        public function store(Request $req){

            $user = new User;

            $validate = $req->validate([
                'nama' => 'required|max:255',
                'username' => 'required',
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
            $user->username = $req->get('username');
            $user->email = $req->get('email');
            $user->kontak = $req->get('kontak');
            $user->orang_tua = $req->get('orang_tua');
            $user->alamat = $req->get('alamat');
            $user->jenis_kelamin =  $req->get('jenis_kelamin');
            $user->kelas = $req->get('kelas');
            $user->password = Hash::make($req->get('password'));
            $user->roles_id = 3 ;

            $user->save();

            $ambildata = User::orderBy('id', 'desc')->pluck('id')->first();

            $tabungan = new Tabungan;

            $tabungan->users_id = $ambildata;
            $tabungan->jumlah_tabungan = 0 ;
            $tabungan->jumlah_dibuku = 0 ;
            $tabungan->jumlah = 0 ;
            $tabungan->premi = 0.5 ;
            $tabungan->sisa = 0 ;

            $tabungan->save();

            $notification = array(
                'message' =>'Data Siswa berhasil ditambahkan', 'alert-type' =>'success'
            );

            return redirect()->route('siswa')->with($notification);
        }

        public function edit(Request $req){
            $user = User::find($req->get('id'));

            $validate = $req->validate([
                'nama' => 'required|max:255',
                'username' => 'required',
                'email' => 'required',
                'kontak' => 'required',
                'password' => 'required',
                'kelas' => 'required',
                'orang_tua' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $user->nama = $req->get('nama');
            $user->username = $req->get('username');
            $user->email = $req->get('email');
            $user->kontak = $req->get('kontak');
            $user->kelas = $req->get('kelas');
            $user->orang_tua = $req->get('orang_tua');
            $user->alamat = $req->get('alamat');
            $user->jenis_kelamin =  $req->get('jenis_kelamin');
            $user->kelas = $req->get('kelas'); ;
            $user->password = Hash::make($req->get('password'));
            $user->roles_id = 3 ;
            $user->save();

            $notification = array(
                'message' => 'Data User berhasil diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('siswa')->with($notification);
        }
        public function destroy($id){
            $user = User::find($id);
            $user->delete();
            $notification = array(
                'message' => 'Data Siswa berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('siswa')->with($notification);
        }
}
