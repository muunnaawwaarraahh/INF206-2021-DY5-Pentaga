<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitizensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('/warga/home', compact('miskin','kaya'));
    }

    public function tampil(){
        $data = Auth::user()->noKK;
        $citizens = DB::table('citizens')
                ->where('noKK', '=', $data)
                ->get();
        return view('warga.data_diri', compact('citizens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->tagihanListrikPerbulanBukti);

        $request->validate([
            'nama' => 'required',
            'noKK' => 'required|size:16|unique:citizens',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'dusun' => 'required',
            'lorong' => 'required',
            'noRumah' => 'required',
            'luasPetakRumah' => 'required',
            'jumlahTanggungan' => 'required',
            'noHP' => 'required',
            'profesi' => 'required',
            'penghasilan' => 'required',
            'jumlahKendaraan' => 'required',
            'kepemilikanRumah' => 'required',
            'pernahMenerimaBantuan' => 'required',
            'tagihanListrikPerbulan' => 'required',
            'tagihanListrikPerbulanBukti' => 'required|mimes:jpeg,png,jpg,gif,svg|max : 100000',
            'tagihanAirPerbulanBukti' => 'mimes:jpeg,png,jpg,gif,svg|max : 100000|nullable',
            'konstruksiRumah' => 'required',
            'konstruksiRumahBukti' => 'required|mimes:jpeg,png,jpg,gif,svg|max : 100000',
        ]);
        
        // aploud listrik
        $imgListrikName = $request->tagihanListrikPerbulanBukti->getClientOriginalName() . '-' . time() 
                            . '.' . $request->tagihanListrikPerbulanBukti->extension();
        $request->tagihanListrikPerbulanBukti->move(public_path('image_listrik'),$imgListrikName );
        
        // aploud air
        
        if ($request->hasFile('tagihanAirPerbulanBukti')){
            $imgAirName = $request->tagihanAirPerbulanBukti->getClientOriginalName() . '-' . time() 
                        . '.' . $request->tagihanAirPerbulanBukti->extension();
            $request->tagihanAirPerbulanBukti->move(public_path('image_air'),$imgAirName );
        }
        else{
            $imgAirName = null;
        }

        // aploud rumah
        $imgRumahName = $request->konstruksiRumahBukti->getClientOriginalName() . '-' . time() 
                        . '.' . $request->konstruksiRumahBukti->extension();
        $request->konstruksiRumahBukti->move(public_path('image_rumah'),$imgRumahName );


        $citizen = new Citizen();
        $citizen->nama = $request->nama;
        $citizen->noKK = $request->noKK;
        $citizen->tempatLahir = $request->tempatLahir;
        $citizen->tanggalLahir = $request->tanggalLahir;
        $citizen->dusun = $request->dusun;
        $citizen->lorong = $request->lorong;
        $citizen->noRumah = $request->noRumah;
        $citizen->luasPetakRumah = $request->luasPetakRumah;
        $citizen->jumlahTanggungan = $request->jumlahTanggungan;
        $citizen->noHP = $request->noHP;
        $citizen->profesi = $request->profesi;
        $citizen->penghasilan = $request->penghasilan;
        $citizen->jumlahKendaraan = $request->jumlahKendaraan;
        $citizen->kepemilikanRumah = $request->kepemilikanRumah;
        $citizen->pernahMenerimaBantuan = $request->pernahMenerimaBantuan;
        $citizen->tagihanListrikPerbulan = $request->tagihanListrikPerbulan;
        $citizen->tagihanListrikPerbulanBukti = $imgListrikName;
        $citizen->tagihanAirPerbulan = $request->tagihanAirPerbulan;
        $citizen->tagihanAirPerbulanBukti = $imgAirName;
        $citizen->konstruksiRumah = $request->konstruksiRumah;
        $citizen->konstruksiRumahBukti = $imgRumahName;
        $citizen->golongan = $request->golongan;
        

        $query = $citizen->save();
        
        //cara lain untuk memasukkan data ke tabel
        // Citizen::create($request->all());
        // return redirect('/registrasi')->withSuccess('Berhasi Melakukan Registrasi!');
        
        if($query){
            return redirect('/warga/data_diri')->withSuccess('Data Berhasil Disimpan!');
        }
        else{
            with('errors', $request->messages()->all()[0])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show(Citizen $citizen)
    {
        $citizen = \App\Models\Citizen::all();
        return view('warga.data_diri', compact('citizen'));
    }
    
    public function notification()
    {
        $pengumuman = \App\Models\Pengumuman::all();
        return view('warga.notifikasi', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        return view('warga.edit', compact('citizen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        $request->validate([
            'dusun' => 'required',
            'lorong' => 'required',
            'noRumah' => 'required',
            'luasPetakRumah' => 'required',
            'jumlahTanggungan' => 'required',
            'noHP' => 'required',
            'profesi' => 'required',
            'penghasilan' => 'required',
            'jumlahKendaraan' => 'required',
            'kepemilikanRumah' => 'required',
            'tagihanListrikPerbulan' => 'required',
            'tagihanListrikPerbulanBukti' => 'mimes:jpeg,png,jpg,gif,svg|max : 100000',
            'tagihanAirPerbulanBukti' => 'mimes:jpeg,png,jpg,gif,svg|max : 100000|nullable',
            'konstruksiRumah' => 'required',
            'konstruksiRumahBukti' => 'mimes:jpeg,png,jpg,gif,svg|max : 100000',
        ]);

        // aploud listrik
        if ($request->hasFile('tagihanListrikPerbulanBukti')){
            $imgListrikName = $request->tagihanListrikPerbulanBukti->getClientOriginalName() . '-' . time() 
                            . '.' . $request->tagihanListrikPerbulanBukti->extension();
            $request->tagihanListrikPerbulanBukti->move(public_path('image_listrik'),$imgListrikName );
        }
        else{
            $imgListrikName = $citizen->tagihanListrikPerbulanBukti;
        }
        
        // aploud air
        
        if ($request->hasFile('tagihanAirPerbulanBukti')){
            $imgAirName = $request->tagihanAirPerbulanBukti->getClientOriginalName() . '-' . time() 
                        . '.' . $request->tagihanAirPerbulanBukti->extension();
            $request->tagihanAirPerbulanBukti->move(public_path('image_air'),$imgAirName );
        }
        else{
            $imgAirName = $citizen->tagihanAirPerbulanBukti;
        }

        // aploud rumah
        if ($request->hasFile('konstruksiRumahBukti')){
            
        $imgRumahName = $request->konstruksiRumahBukti->getClientOriginalName() . '-' . time() 
        . '.' . $request->konstruksiRumahBukti->extension();
        $request->konstruksiRumahBukti->move(public_path('image_rumah'),$imgRumahName );
        }
        else{
            $imgRumahName = $citizen->konstruksiRumahBukti;
        }
        
        Citizen::where('id', $citizen->id)
            ->update([
                'golongan' => $request->golongan,
                'dusun' => $request->dusun,
                'lorong' => $request->lorong,
                'noRumah' => $request->noRumah,
                'luasPetakRumah' => $request->luasPetakRumah,
                'jumlahTanggungan' => $request->jumlahTanggungan,
                'noHP' => $request->noHP,
                'profesi' => $request->profesi,
                'penghasilan' => $request->penghasilan,
                'jumlahKendaraan' => $request->jumlahKendaraan,
                'kepemilikanRumah' => $request->kepemilikanRumah,
                'tagihanListrikPerbulan' => $request->tagihanListrikPerbulan,
                'tagihanListrikPerbulanBukti' => $imgListrikName,
                'tagihanAirPerbulanBukti' => $imgAirName,
                'konstruksiRumah' => $request->konstruksiRumah,
                'konstruksiRumahBukti' => $imgRumahName,
            ]);

        return redirect('/warga/data_diri')->withSuccess('Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        //
    }

    public function logout(){
        Auth::logout();
        return redirect( url('/warga/login') );
    }

    
}
