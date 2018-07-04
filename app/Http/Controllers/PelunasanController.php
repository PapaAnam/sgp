<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderFinal;
use App\Perpanjangan;

class PelunasanController extends Controller
{

	public function index()
	{
		return view('pelunasan.index', [
			'tambahUrl'=>route('pelunasan.create'),
			'title'=>'Data Pelunasan',
			'data'=>OrderFinal::with(['barang', 'konsumen', 'perpanjangan'=>function($q){
				$q->orderBy('id', 'desc')->take(1);
			}])->where('status', 'Lunas')->get(),
		]);
	}

	public function create()
	{
		$listOrderFinal = [];
		foreach (OrderFinal::whereNull('status')->get() as $b) {
			$listOrderFinal[] = [
				'value'=>$b->id,'text'=>$b->nota
			];
		}
		return view('pelunasan.tambah', [
			'action'=>route('pelunasan.store'),
			'back_url'=>route('pelunasan.index'),
			'title'=>'Tambah Data Pelunasan',
			'listOrderFinal'=>$listOrderFinal,
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'bunga'         	=>  'required|numeric',
			'denda'     		=>  'nullable|numeric',
			'total_pelunasan'   =>  'required|numeric',
		]);
		OrderFinal::find($request->order_final_id)->update([
			'bunga'				=> $request->bunga,
			'denda'				=> $request->denda,
			'total_pelunasan'	=> $request->total_pelunasan,
			'status'			=> 'Lunas',
			'tanggal_tebus'		=> date('Y-m-d'),
		]);
		return redirect()->route('pelunasan.index')->with('success_msg', 'Pelunasan baru berhasil ditambahkan');
	}

	public function destroy($id)
	{
		OrderFinal::find($id)->update([
			'bunga'				=> null,
			'denda'				=> null,
			'total_pelunasan'	=> null,
			'status'			=> null,
		]);
		return redirect()->route('pelunasan.index')->with('success_msg', 'Pelunasan berhasil dihapus');
	}

	public function show($id)
	{
		$orderFinal = OrderFinal::with(['barang', 'konsumen', 'perpanjangan'=>function($q){
			$q->orderBy('id', 'desc')->take(1);
		}])->where('id', $id)->first();
		return view('pelunasan.detail', [
			'd'=>$orderFinal,
			'back_url'=>route('pelunasan.index'),
			'title'=>'Detail Data Pelunasan',
			'perpanjangan'=>Perpanjangan::where('id_order_final', $id)->count()
		]);
	}

	public function cetak($id)
	{
		$orderFinal = OrderFinal::with(['barang', 'konsumen', 'perpanjangan'=>function($q){
			$q->orderBy('id', 'desc')->take(1);
		}])->where('id', $id)->first();
		return view('pelunasan.cetak',[
			'd'=>$orderFinal
		]);
	}

}
