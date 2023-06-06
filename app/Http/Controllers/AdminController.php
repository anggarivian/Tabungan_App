<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //  Kelola Akun Petugas ----------------------------------------------------------------
        public function __construct(){
            $this->middleware('auth');
        }
        public function index(){
            $user = User::All();
            $role = Role::All();

            return view('admin.kelolaPetugas', compact('user','role'));
        }
        public function laporan(){
            $user = User::All();
            $role = Role::All();

            return view('laporan.laporanPetugas', compact('user','role'));
        }
        public function store(Request $req){
            $user = new User;

            $validate = $req->validate([
                'nama' => 'required|max:255',
                'username' => 'required',
                'email' => 'required',
                'kontak' => 'required',
                'password' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $user->nama = $req->get('nama');
            $user->username = $req->get('username');
            $user->email = $req->get('email');
            $user->kontak = $req->get('kontak');
            $user->jenis_kelamin = $req->get('jenis_kelamin');
            $user->kelas = '-' ;
            $user->password = Hash::make($req->get('password'));
            $user->roles_id = 2 ;

            $user->save();

            $notification = array(
                'message' =>'Data Petugas berhasil ditambahkan', 'alert-type' =>'success'
            );

            return redirect()->route('petugas')->with($notification);
        }
        public function getDataUser($id){

            $user = User::find($id);

            return response()->json($user);
        }
        public function edit(Request $req){
            $user = User::find($req->get('id'));

            $validate = $req->validate([
                'nama' => 'required|max:255',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'kontak' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $user->nama = $req->get('nama');
            $user->username = $req->get('username');
            $user->email = $req->get('email');
            $user->kontak = $req->get('kontak');
            $user->jenis_kelamin = $req->get('jenis_kelamin');
            $user->kelas = '-' ;
            $user->password = $req->get('password');
            $user->roles_id = 2 ;

            $user->save();

            $notification = array(
                'message' => 'Data Petugas berhasil diubah',
                'alert-type' => 'success'
            );

            return redirect()->route('petugas')->with($notification);
        }
        public function destroy($id){
            $user = User::find($id);

            $user->delete();

            $notification = array(
                'message' => 'Data petugas berhasil dihapus',
                'alert-type' => 'success'
            );

            return redirect()->route('petugas')->with($notification);
        }
}
