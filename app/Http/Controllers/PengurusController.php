<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::all();

        $pengurus->map(function ($pgs) {
            $pgs->organisasis = $pgs->organisasi->map(function($org){
                return $org->nama;
            })->implode(', ');
        });

        return view('pengurus.index',compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        $kelamin = ['Laki-laki', 'Perempuan'];
        
        return view('pengurus.create', compact('organisasi', 'kelamin'));
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
            'NIM'   => 'required|unique:pengurus,NIM',
            'nama' => 'required',
            'kelamin' => 'required',
            'fakultas' => 'required',
            'periode' => 'required',
            'jabatan' => 'required',
            'telp' => 'required',
            'organisasi_id' => 'required|exists:organisasi,id',
        ]);
        
        $pengurus = Pengurus::create($request->all());
        $pengurus->organisasi()->attach($request->organisasi_id);


        return redirect()->route('pengurus.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        return view('pengurus.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengurus $penguru)
    {

        $organisasi = Organisasi::all();
        $kelamin = ['Laki-laki', 'Perempuan'];

        $penguru->organisasis = $penguru->organisasi->map(function($org){
                return $org->nama;
            })->implode(', ');
        
        return view('pengurus.edit', compact('organisasi', 'kelamin'))->with('pengurus', $penguru);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengurus $penguru)
    {
        $request->validate([
            'NIM'   => 'required|unique:pengurus,NIM',
            'nama' => 'required',
            'kelamin' => 'required',
            'fakultas' => 'required',
            'periode' => 'required',
            'jabatan' => 'required',
            'telp' => 'required',
            'organisasi_id' => 'required|exists:organisasi,id',
        ]);
        $penguru->update($request->all());

        return redirect()->route('pengurus.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $penguru)
    {
        $penguru->delete();
        return redirect()->route('pengurus.index')->with('succes','Data Berhasil di Hapus');
    }

}
