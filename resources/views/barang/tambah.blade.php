@extends('layouts.app')
@section('content')
@component('tambah', ['title' => $title,'action'=>$action,'back_url'=>$back_url])
@include('input', ['id'=>'nama','label'=>'Nama Barang'])
@include('input', ['id'=>'harga_a','label'=>'Harga A'])
@include('input', ['id'=>'harga_b','label'=>'Harga B'])
@include('input', ['id'=>'harga_c','label'=>'Harga C'])
@endcomponent
@endsection