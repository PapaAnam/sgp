@extends('layouts.app')
@section('content')
@component('detail', ['title' => $title,'back_url'=>$back_url])
@include('static', ['value'=>$d->nota,'label'=>'Nota'])
@include('static', ['value'=>$d->konsumen->nik,'label'=>'NIK'])
@include('static', ['value'=>$d->konsumen->nama,'label'=>'Nama Konsumen'])
@include('static', ['value'=>$d->konsumen->alamat,'label'=>'Alamat'])
@include('static', ['value'=>$d->konsumen->no_hp,'label'=>'No Hp'])
@include('static', ['value'=>$d->barang->nama,'label'=>'Nama Barang'])
@include('static', ['value'=>$d->tahun,'label'=>'Tahun'])
@include('static', ['value'=>$d->imei,'label'=>'Imei / Serial Number'])
@include('static', ['value'=>$d->kelengkapan,'label'=>'Kelengkapan'])
@include('static', ['value'=>count($d->perpanjangan) > 0 ? $d->perpanjangan[0]->tenor : $d->tenor.' hari','label'=>'Tenor'])
@include('static', ['value'=>count($d->perpanjangan) > 0 ? $d->perpanjangan[0]->jatuh_tempo : $d->jatuh_tempo,'label'=>'Jatuh Tempo'])
@include('static', ['value'=>$d->pinjaman_rp,'label'=>'Pinjaman'])
@include('static', ['value'=>$d->bunga_rp,'label'=>'Bunga'])
@include('static', ['value'=>$d->denda_rp,'label'=>'Denda'])
@include('static', ['value'=>$d->total_pelunasan_rp,'label'=>'Jumlah Bayar'])
@include('static', ['value'=>$perpanjangan,'label'=>'Perpanjangan'])
<div class="row">
	<div class="col-md-12">
		@include('print-button', ['link'=>route('pelunasan.print', [$d->id])])
	</div>
</div>
@endcomponent
@endsection