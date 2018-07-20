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
@include('static', ['value'=>$d->pinjaman_rp,'label'=>'Pinjaman'])
@include('static', ['value'=>$d->tenor.' hari','label'=>'Tenor'])
@include('static', ['value'=>$d->jatuh_tempo,'label'=>'Jatuh Tempo'])
@include('static', ['value'=>$d->jumlah_tebus_rp,'label'=>'Jumlah Tebus'])
<div class="row">
	<div class="col-md-12">
		@include('print-button', ['link'=>route('order-final.print', [$d->id])])
	</div>
</div>
@endcomponent
@endsection