<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // Read Data Petugas --------------------------------------------------------------------------------------------
    public function index(){
        $user = User::All();
        $role = Role::All();
        return view('admin.kelolaPetugas', compact('user','role'));
    }
    // Laporan Data Petugas -----------------------------------------------------------------------------------------
    public function laporan(){
        $user = User::All();
        $role = Role::All();
        return view('laporan.laporanPetugas', compact('user','role'));
    }
    // Create Data Petugas ------------------------------------------------------------------------------------------
    public function store(Request $req){
        $user = new User;
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $user->nama = $req->get('nama');
        $user->id_tabungan = '-';
        $user->email = $req->get('email');
        $user->kontak = $req->get('kontak');
        $user->jenis_kelamin = $req->get('jenis_kelamin');
        $user->password = Hash::make($req->get('password'));
        $user->roles_id = 2 ;
        $user->kelas = '-' ;
        $user->save();
        $notification = array(
            'message' =>'Data User berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('petugas')->with($notification);
    }
    // Get Data User ------------------------------------------------------------------------------------------------
    public function getDataUser($id){
        $user = User::find($id);
        return response()->json($user);
    }
    // Update Data Petugas ------------------------------------------------------------------------------------------
    public function edit(Request $req){
        $user = User::find($req->get('id'));
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $user->nama = $req->get('nama');
        $user->email = $req->get('email');
        $user->jenis_kelamin = $req->get('jenis_kelamin');
        $user->save();
        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('petugas')->with($notification);
    }
    // Delete Data Petugas ------------------------------------------------------------------------------------------
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('petugas')->with($notification);
    }
}
