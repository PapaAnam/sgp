<?php

namespace App\Http\Controllers;

use App\OrderFinal;
use App\Barang;
use App\Konsumen;
use App\Perpanjangan;
use Illuminate\Http\Request;

class OrderFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order-final.index', [
            'tambahUrl'=>route('order-final.create'),
            'title'=>'Data Order Final',
            'data'=>OrderFinal::with('barang', 'konsumen')->whereNull('status')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBarang = [];
        foreach (Barang::all() as $b) {
            $listBarang[] = [
                'value'=>$b->id,'text'=>$b->nama
            ];
        }
        $listKonsumen = [];
        foreach (Konsumen::all() as $b) {
            $listKonsumen[] = [
                'value'=>$b->nik,'text'=>$b->nama
            ];
        }
        $listTenor =[['value'=>15,'text'=>'15 hari'],['value'=>30,'text'=>'30 hari']];
        return view('order-final.tambah', [
            'action'=>route('order-final.store'),
            'back_url'=>route('order-final.index'),
            'title'=>'Tambah Data Order Final',
            'listBarang'=>$listBarang,
            'listKonsumen'=>$listKonsumen,
            'listTenor'=>$listTenor,
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
            'nik'           =>  'required',
            'id_barang'     =>  'required',
            'tahun'         =>  'numeric|nullable',
            'imei'          =>  'numeric',
            'kelengkapan'   =>  'required',
            'pinjaman'      =>  'required|numeric',
            'tenor'         =>  'required',
            'jatuh_tempo'   =>  'date_format:Y-m-d',
            'jumlah_tebus'  =>  'required|numeric',
        ]);
        OrderFinal::create([
            'nik'           =>  $request->nik,
            'id_barang'     =>  $request->id_barang,
            'tahun'         =>  $request->tahun,
            'imei'          =>  $request->imei,
            'kelengkapan'   =>  $request->kelengkapan,
            'pinjaman'      =>  $request->pinjaman,
            'tenor'         =>  $request->tenor,
            'jatuh_tempo'   =>  $request->jatuh_tempo,
            'jumlah_tebus'  =>  $request->jumlah_tebus,
            'tanggal'       =>  date('Y-m-d'),
            'nota'          =>  config('app.nota_prefix').'-'.date('YmdHis')
        ]);
        return redirect()->route('order-final.index')->with('success_msg', 'Order Final baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderFinal  $orderFinal
     * @return \Illuminate\Http\Response
     */
    public function show(OrderFinal $orderFinal)
    {
        $orderFinal = OrderFinal::with('barang', 'konsumen')->where('id', $orderFinal->id)->first();
        return view('order-final.detail', [
            'd'=>$orderFinal,
            'back_url'=>route('order-final.index'),
            'title'=>'Detail Data Order Final',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderFinal  $orderFinal
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderFinal $orderFinal)
    {
        return view('order-final.ubah', [
            'action'=>route('order-final.update', [$orderFinal->id]),
            'back_url'=>route('order-final.index'),
            'title'=>'Ubah Data Order Final',
            'd'=>$orderFinal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderFinal  $orderFinal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderFinal $orderFinal)
    {
        $request->validate([
            'nama'      => 'required',
            'harga_a'   => 'required|numeric|min:1000',
            'harga_b'   => 'required|numeric|min:1000',
            'harga_c'   => 'required|numeric|min:1000',
        ]);
        $orderFinal->update([
            'nama'      => $request->nama,
            'harga_a'   => $request->harga_a,
            'harga_b'   => $request->harga_b,
            'harga_c'   => $request->harga_c,
        ]);
        return redirect()->route('order-final.index')->with('success_msg', 'Order Final berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderFinal  $orderFinal
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderFinal $orderFinal)
    {
        $orderFinal->delete();
        return redirect()->route('order-final.index')->with('success_msg', 'Order Final berhasil dihapus');
    }

    public function cetak(OrderFinal $orderFinal)
    {
        $orderFinal = OrderFinal::with('barang', 'konsumen')->where('id', $orderFinal->id)->first();
        return view('order-final.cetak',[
            'd'=>$orderFinal
        ]);
    }

    public function cek(OrderFinal $orderFinal)
    {
        $perpanjangan = Perpanjangan::where('id_order_final', $orderFinal->id)->get();
        $adaPerpanjangan = count($perpanjangan) > 0;
        $denda = 0;
        if(strtotime(date('Y-m-d')) / 3600 >= 1 && strtotime($orderFinal->tanggal) / 3600 <= 7){
            $denda = $orderFinal->pinjaman*0.05;
        }
        $bungaPersen=$orderFinal->tenor == 15 ? 0.05 : 0.1;
        $bunga = $orderFinal->pinjaman*$bungaPersen;
        $tenor=$orderFinal->tenor;
        $jatuh_tempo=$orderFinal->jatuh_tempo;
        if($adaPerpanjangan){
            $perp = Perpanjangan::where('id_order_final', $orderFinal->id)->orderBy('id', 'desc')->first();
            $bungaPersen=$perp->tenor == 15 ? 0.05 : 0.1;
            $bunga = $orderFinal->pinjaman*$bungaPersen;
            $tenor=$perp->tenor;
            $jatuh_tempo=$perp->jatuh_tempo;
        }
        return view('order-final.cek', [
            'd'=>$orderFinal,
            'bunga'=>$bunga,
            'denda'=>$denda,
            'perpanjangan'=>count($perpanjangan),
            'tenor'=>$tenor,
            'jatuh_tempo'=>$jatuh_tempo,
            'total_bayar'=>$orderFinal->pinjaman+$bunga+$denda,
        ]);
    }

    public function rahn()
    {
        $data=OrderFinal::with('barang', 'konsumen')->get();
        $total=count($data);
        $total_konsumen=Konsumen::count();
        $total_barang=Barang::count();
        $total_pinjaman=$data->sum(function($i){return $i->pinjaman;});
        $total_bunga=$data->sum(function($i){return $i->jumlah_tebus-$i->pinjaman;});
        return view('order-final.rahn', [
            'data'=>$data,
            'total'=>$total,
            'total_konsumen'=>$total_konsumen,
            'total_barang'=>$total_barang,
            'total_pinjaman'=>$total_pinjaman,
            'total_bunga'=>$total_bunga,
        ]);
    }

    public function dueDate()
    {
        return view('order-final.due-date', [
            'data'=>OrderFinal::with('barang', 'konsumen')->orderBy('tanggal_tebus')->get(),
        ]);
    }

    public function keuangan()
    {
        return view('order-final.keuangan', [
            'data'=>OrderFinal::with('barang', 'konsumen')->where('status', 'Lunas')->orderBy('tanggal_tebus')->get(),
            'data2'=>Perpanjangan::with('order.barang', 'order.konsumen')->get(),
        ]);
    }
}
