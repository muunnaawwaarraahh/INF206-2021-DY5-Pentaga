<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
        $pengumuman = \App\Models\Pengumuman::all();
        return view('admin.pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumumantambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'required|mimes:pdf', 
            ]);
            
            // aploud dokumen lampiran pengumuman
            $imgdokumen = $request->dokumen->getClientOriginalName() . '-' . time() 
            . '.' . $request->dokumen->extension();
            $request->dokumen->move(public_path('image_dokumen_pengumuman'),$imgdokumen );
            
            $pengumuman = new Pengumuman();
            $pengumuman->judul = $request->judul;
            $pengumuman->deskripsi = $request->deskripsi;
            $pengumuman->dokumen = $imgdokumen;
            
            $pengumuman->save();
            

        return redirect('/admin/pengumuman')->withSuccess('Pengumuman Berhasil Diunggah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumumanedit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'mimes:pdf', 
            ]);
            
            if ($request->hasFile('dokumen')){
                $imgdokumen = $request->dokumen->getClientOriginalName() . '-' . time() 
                . '.' . $request->dokumen->extension();
    
                $request->dokumen->move(public_path('image_dokumen_pengumuman'),$imgdokumen );
            }
            else{
                $imgdokumen = $pengumuman->dokumen;
            }



            // aploud dokumen lampiran pengumuman
           

        Pengumuman::where('id', $pengumuman->id)
            ->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'dokumen' => $imgdokumen,
            ]);
        return redirect('/admin/pengumuman')->withSuccess('Info Pengumuman Berhasil Diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);
        return redirect('/admin/pengumuman')->withSuccess('Info Pengumuman Berhasil Dihapus!');
    }

    public function viewPengumuman($id){
        $data = Pengumuman::find($id);
        return view('warga.notifikasiView', compact('data'));
    }

    public function unduhPengumuman($dokumen){
        return response()->download('image_dokumen_pengumuman/'.$dokumen);
    }
}
