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
 
            $userSiswa = User::where('roles_id', '3')->get();

            return view('petugas.kelolaSiswa', compact('user','role','userSiswa'));
        }
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

            $idTabungan = $req->get('id_tabungan'); // Kriteria id_tabungan yang sama
            $namaBaru = $req->get('nama'); // Nama baru yang ingin diubah
            $kelasBaru = $req->get('kelas'); // Nama baru yang ingin diubah
            Tabungan::where('id_tabungan', $idTabungan)->update(['nama' => $namaBaru]);
            Tabungan::where('id_tabungan', $idTabungan)->update(['kelas' => $kelasBaru]);

            $notification = array(
                'message' => 'Data Siswa berhasil diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('siswa')->with($notification);
        }
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
}
