<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function index(){
        $pengajuan = Pengajuan::All();
        return view('pengajuan.pengajuan', compact('pengajuan'));
    }
}
