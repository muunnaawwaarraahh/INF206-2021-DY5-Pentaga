<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizens =  \App\Models\Citizen::all();

        $miskin = DB::table('citizens')
        ->select(DB::raw('count(*) as jumlahmiskin, golongan'))
        ->where('golongan', '=', 'Miskin')
        ->groupBy('golongan')
        ->get();

        $kaya = DB::table('citizens')
        ->select(DB::raw('count(*) as jumlahkaya, golongan'))
        ->where('golongan', '=', 'Kaya')
        ->groupBy('golongan')
        ->get();

        $belum = DB::table('citizens')
        ->select(DB::raw('count(*) as jumlahbelum, golongan'))
        ->where('golongan', '=', 'belum diverifikasi')
        ->groupBy('golongan')
        ->get();

        return view('admin.home', compact('citizens','miskin', 'kaya', 'belum'));
    }

    public function verifikasi(){

        $citizens = DB::table('citizens')
                ->where('golongan', '=', "belum diverifikasi")
                ->get();
        return view('admin.verifikasi', compact('citizens'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Citizen $citizen)
    {
        return view('admin.verfikasidetail', compact('citizen'));
    }
    
    public function terdaftar(){

        $citizens = DB::table('citizens')
                ->where('golongan', '!=', "belum diverifikasi")
                ->get();
        return view('admin.terdaftar', compact('citizens'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function shows(Citizen $citizen)
    {
        return view('admin.terdaftardetail', compact('citizen'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        $request->validate([
            'golongan' => 'required',
        ]);

        Citizen::where('id', $citizen->id)
            ->update([
                'golongan' => $request->golongan,
            ]);
        return redirect('/admin/terdaftar')->withSuccess('Konfirmasi Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        Citizen::destroy($citizen->id);
        return redirect('admin.home')->withSuccess('Data Berhasil Dihapus!');
    }

    public function login(){
        return view('/admin/login');
    }

    
    public function check(Request $request){
        //Validate Inputs
        $request->validate([
            'username'=> 'required|exists:admins,username',
            'password'=> 'required|min:5',
        ],[
            'username.exists'=>'Username tidak ditemukan'
        ]);
        
        $creds = $request->only('username','password');
        if( Auth::guard('admin')->attempt($creds) ){
            return redirect('/admin/home');
        }else{
            return redirect('/admin/login')->with('fail','Inputan Anda Salah');
        }
       

   }

   public function logout(){
        Auth::logout();
        return redirect( url('/admin/login') );
    }
   public function unduhPengumuman($dokumen){
    return response()->download('image_dokumen_pengumuman/'.$dokumen);
    }
}
