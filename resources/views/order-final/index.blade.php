@extends('layouts.app')
@section('content')
@component('view',['tambahUrl'=>$tambahUrl, 'title'=>$title])
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nota</th>
            <th>Konsumen</th>
            <th>Barang</th>
            <th>Pinjaman</th>
            <th>Tenor</th>
            <th>Jatuh Tempo</th>
            <th>Jumlah Tebus</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nota</th>
            <th>Konsumen</th>
            <th>Barang</th>
            <th>Pinjaman</th>
            <th>Tenor</th>
            <th>Jatuh Tempo</th>
            <th>Jumlah Tebus</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->nota }}</td>
            <td>{{ $d->konsumen->nama }}</td>
            <td>{{ $d->barang->nama }}</td>
            <td>{{ $d->pinjaman }}</td>
            <td>{{ $d->tenor }}</td>
            <td>{{ $d->jatuh_tempo }}</td>
            <td>{{ $d->jumlah_tebus_rp }}</td>
            <td>
                @include('detail-button', ['link'=>route('order-final.show', [$d->id])])
                @include('hapus-button', ['link'=>route('order-final.destroy', [$d->id])])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
@include('form-hapus')
@endsection
@include('hapus-event')