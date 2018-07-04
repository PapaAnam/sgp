@extends('layouts.app')
@section('content')
@component('view',['tambahUrl'=>$tambahUrl, 'title'=>$title])
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga A</th>
            <th>Harga B</th>
            <th>Harga C</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nama</th>
            <th>Harga A</th>
            <th>Harga B</th>
            <th>Harga C</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->nama }}</td>
            <td>{{ number_format($d->harga_a, 2, ',', '.') }}</td>
            <td>{{ number_format($d->harga_b, 2, ',', '.') }}</td>
            <td>{{ number_format($d->harga_c, 2, ',', '.') }}</td>
            <td>
                @include('edit-button', ['link'=>route('barang.edit', [$d->id])])
                @include('hapus-button', ['link'=>route('barang.destroy', [$d->id])])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
@include('form-hapus')
@endsection
@include('hapus-event')