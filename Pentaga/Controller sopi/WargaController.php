<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
	public function home(){
        return view('warga/home');
    }

    public function regis(){
        return view('registrasi/registrasi');
    }

}
