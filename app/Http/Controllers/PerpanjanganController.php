<?php

namespace App\Http\Controllers;

use App\Perpanjangan;
use App\OrderFinal;
use Illuminate\Http\Request;

class PerpanjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perpanjangan.index', [
            'tambahUrl'=>route('perpanjangan.create'),
            'title'=>'Data Perpanjangan',
            'data'=>Perpanjangan::with('order.konsumen', 'order.barang')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listOrderFinal = [];
        foreach (OrderFinal::whereNull('status')->get() as $b) {
            $listOrderFinal[] = [
                'value'=>$b->id,'text'=>$b->nota
            ];
        }
        return view('perpanjangan.tambah', [
            'action'=>route('perpanjangan.store'),
            'back_url'=>route('perpanjangan.index'),
            'title'=>'Tambah Data Perpanjangan',
            'listOrderFinal'=>$listOrderFinal,
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
            'tenor'         =>  'required',
            'jatuh_tempo'   =>  'date_format:Y-m-d',
            'jumlah_tebus'  =>  'required|numeric',
        ]);
        Perpanjangan::create([
            'tenor'                 =>  $request->tenor,
            'jatuh_tempo'           =>  $request->jatuh_tempo,
            'jumlah_tebus'          =>  $request->jumlah_tebus,
            'tanggal'               =>  date('Y-m-d'),
            'id_order_final'        =>  $request->id_order_final,
            'bunga'                 =>  $request->bunga,
            'denda'                 =>  $request->denda,
            'admin'                 =>  $request->admin,
        ]);
        return redirect()->route('perpanjangan.index')->with('success_msg', 'Perpanjangan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function show(Perpanjangan $perpanjangan)
    {
        $perpanjangan = Perpanjangan::with('order.barang', 'order.konsumen')->where('id', $perpanjangan->id)->first();
        return view('perpanjangan.detail', [
            'd'=>$perpanjangan,
            'back_url'=>route('perpanjangan.index'),
            'title'=>'Detail Data Perpanjangan',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perpanjangan $perpanjangan)
    {
        return view('perpanjangan.ubah', [
            'action'=>route('perpanjangan.update', [$perpanjangan->id]),
            'back_url'=>route('perpanjangan.index'),
            'title'=>'Ubah Data Perpanjangan',
            'd'=>$perpanjangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perpanjangan $perpanjangan)
    {
        $request->validate([
            'nama'      => 'required',
            'harga_a'   => 'required|numeric|min:1000',
            'harga_b'   => 'required|numeric|min:1000',
            'harga_c'   => 'required|numeric|min:1000',
        ]);
        $perpanjangan->update([
            'nama'      => $request->nama,
            'harga_a'   => $request->harga_a,
            'harga_b'   => $request->harga_b,
            'harga_c'   => $request->harga_c,
        ]);
        return redirect()->route('perpanjangan.index')->with('success_msg', 'Perpanjangan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perpanjangan $perpanjangan)
    {
        $perpanjangan->delete();
        return redirect()->route('perpanjangan.index')->with('success_msg', 'Perpanjangan berhasil dihapus');
    }

    public function cetak(Perpanjangan $perpanjangan)
    {
        $perpanjangan = Perpanjangan::with('order.barang', 'order.konsumen')->where('id', $perpanjangan->id)->first();
        return view('perpanjangan.cetak',[
            'd'=>$perpanjangan
        ]);
    }

    public function cek(OrderFinal $orderFinal)
    {
        $denda = 0;
        if(strtotime(date('Y-m-d')) / 3600 >= 1 && strtotime($orderFinal->tanggal) / 3600 <= 7){
            $denda = $orderFinal->pinjaman*0.05;
        }
        $bungaPersen=$orderFinal->tenor == 15 ? 0.05 : 0.1;
        $bunga = $orderFinal->pinjaman*$bungaPersen;
        $listTenor =[['value'=>15,'text'=>'15 hari'],['value'=>30,'text'=>'30 hari']];
        return view('perpanjangan.cek', [
            'd'=>$orderFinal,
            'bunga'=>$bunga,
            'total_bayar'=>$orderFinal->pinjaman+$bunga+$denda,
            'denda'=>$denda,
            'admin'=>$orderFinal->pinjaman*0.01,
            'listTenor'=>$listTenor,
        ]);
    }
}
