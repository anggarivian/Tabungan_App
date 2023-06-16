<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PetugasController extends Controller
{
    // Kelola Siswa --------------------------------
        public function __construct(){
            $this->middleware('auth');
        }
        public function index(){
            $user = User::All();
            $role = Role::All();
            return view('petugas.kelolaSiswa', compact('user','role'));
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
