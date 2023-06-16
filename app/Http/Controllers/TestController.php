<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Test;

class TestController extends Controller
{
    //

    public function beranda(){

        $bebas = User::All();

        return view('petugas.test', compact('bebas'));
    }
}
