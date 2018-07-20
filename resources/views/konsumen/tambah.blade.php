@extends('layouts.app')
@section('content')
@component('tambah', ['title' => $title,'action'=>$action,'back_url'=>$back_url])
@include('input', ['id'=>'nama','label'=>'Nama'])
@include('input', ['id'=>'nik','label'=>'NIK'])
@include('input', ['id'=>'no_hp','label'=>'No Hp'])
@include('textarea', ['id'=>'alamat','label'=>'Alamat'])
@endcomponent
@endsection