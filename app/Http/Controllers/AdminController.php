<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::All();
        $role = Role::All();

        return view('admin.kelolaPetugas', compact('user','role'));
    }

    public function laporan()
    {
        $user = User::All();
        $role = Role::All();

        return view('laporan.laporanPetugas', compact('user','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $user = new User;

<<<<<<< HEAD
        return view('admin.kelolaPetugas', compact('user','role'));
    }

    public function laporan()
    {
        $user = User::All();
        $role = Role::All();

        $user->save();

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */}
    
    public function store(Request $req)
    {
        $user = new User;

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::find($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $user = User::find($req->get('id'));

        $notification = array(
            'message' =>'Data User berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('petugas')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user->nama = $req->get('nama');
        $user->email = $req->get('email');
        $user->jenis_kelamin = $req->get('jenis_kelamin');
        $user->password = $req->get('password');
        $user->roles_id = 2 ;

        $user->save();

=======
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user->nama = $req->get('nama');
        $user->email = $req->get('email');
        $user->jenis_kelamin = $req->get('jenis_kelamin');
        $user->password = Hash::make($req->get('password'));
        $user->roles_id = 2 ;

        $user->save();

        $notification = array(
            'message' =>'Data User berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('petugas')->with($notification);
    }

    public function getDataUser($id){

        $user = User::find($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $user = User::find($req->get('id'));

        $validate = $req->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user->nama = $req->get('nama');
        $user->email = $req->get('email');
        $user->jenis_kelamin = $req->get('jenis_kelamin');
        $user->password = $req->get('password');
        $user->roles_id = 2 ;

        $user->save();

>>>>>>> parent of 3a6a495 (Edit Update Petugas)
        $notification = array(
            'message' => 'Data User berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('petugas')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        $notification = array(
            'message' => 'Data User berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('petugas')->with($notification);
    }
}
