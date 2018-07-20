@extends('layouts.app')
@section('content')
@component('tambah', ['title' => $title,'action'=>$action,'back_url'=>$back_url])
@method('PUT')
@include('input', ['value'=>$d->nama,'id'=>'nama','label'=>'Nama'])
@include('input', ['value'=>$d->nik,'id'=>'nik','label'=>'NIK'])
@include('input', ['value'=>$d->no_hp,'id'=>'no_hp','label'=>'No Hp'])
@include('textarea', ['value'=>$d->alamat,'id'=>'alamat','label'=>'Alamat'])
@endcomponent
@include('form-hapus')
@endsection