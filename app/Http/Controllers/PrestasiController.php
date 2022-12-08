<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('prestasi.index',compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        $predikat = ['Emas', 'Perak', 'Perunggu'];
        

        return view('prestasi.create', compact('organisasi','predikat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'predikat' => 'required',
            'tahun' => 'required',
            'organisasi_id' => 'required|exists:organisasi,id',
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if ($request->file('dokumentasi')){
            $validate['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi');
        }

        Prestasi::create( $validate);

        return redirect()->route('prestasi.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        
        $organisasi = Organisasi::all();
        $predikat = ['Emas', 'Perak', 'Perunggu'];
        
        return view('prestasi.edit', compact('organisasi', 'predikat'))->with('prestasi', $prestasi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'predikat' => 'required',
            'tahun' => 'required',
            'organisasi_id' => 'required|exists:organisasi,id',
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->file('dokumentasi')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi');
        }

        $prestasi->update($validate);
        return redirect()->route('prestasi.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        if($prestasi->dokumentasi){
            Storage::delete($prestasi->dokumentasi);
        }

        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('succes','Data Berhasil di Hapus');
    }

}