<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;

class TabunganController extends Controller
{
    public function index_stor(){
        $stor = Tabungan::All();
        return view('petugas.kelolaStor', compact('stor'));
    }
    public function index_tarik(){
        $tarik = Tabungan::All();
        return view('petugas.kelolaTarik', compact('tarik'));
    }
}
