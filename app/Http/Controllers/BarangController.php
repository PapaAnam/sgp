<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.index', [
            'tambahUrl'=>route('barang.create'),
            'title'=>'Data Barang',
            'data'=>Barang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.tambah', [
            'action'=>route('barang.store'),
            'back_url'=>route('barang.index'),
            'title'=>'Tambah Data Barang',
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
            'harga_a'   => 'required|numeric|min:1000',
            'harga_b'   => 'required|numeric|min:1000',
            'harga_c'   => 'required|numeric|min:1000',
        ]);
        Barang::create([
            'nama'      => $request->nama,
            'harga_a'   => $request->harga_a,
            'harga_b'   => $request->harga_b,
            'harga_c'   => $request->harga_c,
        ]);
        return redirect()->route('barang.index')->with('success_msg', 'Barang baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.ubah', [
            'action'=>route('barang.update', [$barang->id]),
            'back_url'=>route('barang.index'),
            'title'=>'Ubah Data Barang',
            'd'=>$barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama'      => 'required',
            'harga_a'   => 'required|numeric|min:1000',
            'harga_b'   => 'required|numeric|min:1000',
            'harga_c'   => 'required|numeric|min:1000',
        ]);
        $barang->update([
            'nama'      => $request->nama,
            'harga_a'   => $request->harga_a,
            'harga_b'   => $request->harga_b,
            'harga_c'   => $request->harga_c,
        ]);
        return redirect()->route('barang.index')->with('success_msg', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success_msg', 'Barang berhasil dihapus');
    }

    public function cek(Barang $barang)
    {
        return view('barang.cek', [
            'd'=>$barang
        ]);
    }
}
