@extends('layouts.app')
@section('content')
@component('tambah', ['title' => $title,'action'=>$action,'back_url'=>$back_url])
@method('PUT')
@include('input', ['value'=>$d->nama,'id'=>'nama','label'=>'Nama Barang'])
@include('input', ['value'=>$d->harga_a,'id'=>'harga_a','label'=>'Harga A'])
@include('input', ['value'=>$d->harga_b,'id'=>'harga_b','label'=>'Harga B'])
@include('input', ['value'=>$d->harga_c,'id'=>'harga_c','label'=>'Harga C'])
@endcomponent
@include('form-hapus')
@endsection