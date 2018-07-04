@extends('layouts.app')
@section('content')
@component('detail', ['title' => $title,'back_url'=>$back_url])
@include('static', ['value'=>$d->order->nota,'label'=>'Nota'])
@include('static', ['value'=>$d->order->konsumen->nik,'label'=>'NIK'])
@include('static', ['value'=>$d->order->konsumen->nama,'label'=>'Nama Konsumen'])
@include('static', ['value'=>$d->order->konsumen->alamat,'label'=>'Alamat'])
@include('static', ['value'=>$d->order->konsumen->no_hp,'label'=>'No Hp'])
@include('static', ['value'=>$d->order->barang->nama,'label'=>'Nama Barang'])
@include('static', ['value'=>$d->order->tahun,'label'=>'Tahun'])
@include('static', ['value'=>$d->order->imei,'label'=>'Imei / Serial Number'])
@include('static', ['value'=>$d->order->kelengkapan,'label'=>'Kelengkapan'])
@include('static', ['value'=>$d->order->tenor.' hari','label'=>'Tenor'])
@include('static', ['value'=>$d->order->jatuh_tempo,'label'=>'Jatuh Tempo'])
@include('static', ['value'=>$d->order->pinjaman_rp,'label'=>'Pinjaman'])
@include('static', ['value'=>$d->bunga_rp,'label'=>'Bunga'])
@include('static', ['value'=>$d->denda_rp,'label'=>'Denda'])
@include('static', ['value'=>$d->admin_rp,'label'=>'Admin'])
@include('static', ['value'=>$d->order->jumlah_tebus_rp,'label'=>'Jumlah Bayar'])
<div class="text-success">
	@include('static', ['value'=>$d->tenor.' hari','label'=>'Tenor Baru'])
	@include('static', ['value'=>$d->jatuh_tempo,'label'=>'Jatuh Tempo Baru'])
	@include('static', ['value'=>$d->order->pinjaman_rp,'label'=>'Pinjaman'])
	@include('static', ['value'=>$d->bunga_baru_rp,'label'=>'Bunga Baru'])
	@include('static', ['value'=>$d->jumlah_tebus_rp,'label'=>'Jumlah Bayar Baru'])
</div>
<div class="row">
	<div class="col-md-12">
		@include('print-button', ['link'=>route('perpanjangan.print', [$d->id])])
	</div>
</div>
@endcomponent
@endsection