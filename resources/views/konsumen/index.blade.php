@extends('layouts.app')
@section('content')
@component('view',['tambahUrl'=>$tambahUrl, 'title'=>$title])
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->nik }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->no_hp }}</td>
            <td>{{ $d->alamat }}</td>
            <td>
                @include('edit-button', ['link'=>route('konsumen.edit', [$d->nik])])
                @include('hapus-button', ['link'=>route('konsumen.destroy', [$d->nik])])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
@include('form-hapus')
@endsection
@include('hapus-event')