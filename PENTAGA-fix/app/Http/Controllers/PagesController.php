<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
	public function login(){
        
        return view('login/login');
    }

    public function regis(){
        return view('registrasi/registrasi');
    }

    public function create(Request $request){
        // validate request
        $request->validate([
            'nama'=>'required',
            'noKK'=>'required|size:16|unique:users,noKK',
            'username'=> 'required|unique:users,username',
            'password'=> 'required|min:5',
            'password2'=> 'required|min:5|same:password',
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->noKK = $request->noKK;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        // $citizen->password = Hash::make($request->password);

        $query = $user->save();
        
        if($query){
            return back()->with('success', 'Berhasil melakukan registrasi!');
        }
        else{
            return back()->with('fail', 'Gagal melakukan registrasi!');
        }
    }

    public function check(Request $request){
        $request->validate([
            'username'=> 'required|exists:users,username',
            'password'=> 'required|min:5',
        ],[
            'username.exists'=>'Username tidak ditemukan'
        ]);

        $creds = $request->only('username','password');
        if( Auth::guard('web')->attempt($creds) ){

            return redirect('/warga/home');

        }else{
            return redirect('/warga/login')->with('fail','Inputan Anda Salah!');
        }

        // if form validating successfully, the process login
        // $user = User::where('username', '=', $request->username)->first();
        // if($user){
        //     if(Hash::check($request->password, $user->password)){
        //         // if password match
        //         $request->session()->put('LoggedUser', $user->id);
        //         return redirect('/warga/home');
        //     }else{
        //         return back()->with('status', 'Password yang anda masukkan salah!');
        //     }

        // }else{
        //     return back()->with('status', 'Username yang Anda masukkan salah!');
        // }

    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/warga/login');
    }

}
