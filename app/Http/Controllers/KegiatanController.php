<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('kegiatan.index',compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        
        return view('kegiatan.create', compact('organisasi'));
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
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'thn_akademik' => 'required',
            'organisasi_id' => 'required|exists:organisasi,id',
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->file('dokumentasi')){
            $validate['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi');
        }
        
        Kegiatan::create($validate);


        return redirect()->route('kegiatan.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        $organisasi = Organisasi::all();
        
        return view('kegiatan.edit', compact('organisasi'))->with('kegiatan', $kegiatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'thn_akademik' => 'required',
            'organisasi_id' => 'required|exists:organisasi,id',
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->file('dokumentasi')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi');
        }

        $kegiatan->update($validate);

        return redirect()->route('kegiatan.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if($kegiatan->dokumentasi){
            Storage::delete($kegiatan->dokumentasi);
        }
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('succes','Data Berhasil di Hapus');
    }

}