<?php

namespace App\Http\Controllers;

use App\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('konsumen.index', [
            'tambahUrl'=>route('konsumen.create'),
            'title'=>'Data Konsumen',
            'data'=>Konsumen::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsumen.tambah', [
            'action'=>route('konsumen.store'),
            'back_url'=>route('konsumen.index'),
            'title'=>'Tambah Data Konsumen',
        ]);
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
            'nama'      => 'required',
            'nik'   => 'required|numeric|unique:konsumen,nik',
            'no_hp'   => 'required|numeric',
            'alamat'   => 'required',
        ]);
        Konsumen::create([
            'nama'      => $request->nama,
            'nik'   => $request->nik,
            'no_hp'   => $request->no_hp,
            'alamat'   => $request->alamat,
        ]);
        return redirect()->route('konsumen.index')->with('success_msg', 'Konsumen baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function show(Konsumen $konsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $konsumen = Konsumen::find($nik);
        return view('konsumen.ubah', [
            'action'=>route('konsumen.update', [$konsumen->nik]),
            'back_url'=>route('konsumen.index'),
            'title'=>'Ubah Data Konsumen',
            'd'=>$konsumen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $konsumen = Konsumen::find($nik);
        $rules = [
            'nama'      => 'required',
            'nik'   => 'required|numeric',
            'no_hp'   => 'required|numeric',
            'alamat'   => 'required',
        ];
        if($konsumen->nik != $request->nik){
            $rules['nik'] = 'required|numeric|unique:konsumen';
        }
        $request->validate($rules);
        $konsumen->update([
            'nama'      => $request->nama,
            'nik'   => $request->nik,
            'no_hp'   => $request->no_hp,
            'alamat'   => $request->alamat,
        ]);
        return redirect()->route('konsumen.index')->with('success_msg', 'Konsumen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $konsumen = Konsumen::find($nik);
        $konsumen->delete();
        return redirect()->route('konsumen.index')->with('success_msg', 'Konsumen berhasil dihapus');
    }

    public function cek($nik)
    {
        $konsumen = Konsumen::find($nik);
        return view('konsumen.cek', [
            'd'=>$konsumen
        ]);
    }
}
