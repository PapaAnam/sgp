@extends('layouts.app')
@section('content')
@component('tambah', ['title' => $title,'action'=>$action,'back_url'=>$back_url])
@include('select', ['id'=>'id_barang','label'=>'Pilih Barang', 'selectData'=>$listBarang])
<div id="cek-barang-view"></div>
<div class="row form-group">
	<div class="col col-md-3">
	</div>
	<div class="col-12 col-md-9">
		<a href="#" id="cek-barang" class="btn btn-primary btn-sm">Cek Barang</a>
		<a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm">Tambah Barang</a>
	</div>
</div>
@include('select', ['id'=>'nik','label'=>'Pilih Konsumen', 'selectData'=>$listKonsumen])
<div id="cek-konsumen-view"></div>
<div class="row form-group">
	<div class="col col-md-3">
	</div>
	<div class="col-12 col-md-9">
		<a href="#" id="cek-konsumen" class="btn btn-primary btn-sm">Cek Konsumen</a>
		<a href="{{ route('konsumen.create') }}" class="btn btn-primary btn-sm">Tambah Konsumen</a>
	</div>
</div>
@include('input_number', ['id'=>'tahun','label'=>'Tahun'])
@include('input', ['id'=>'imei','label'=>'Imei / Serial Number'])
@include('textarea', ['id'=>'kelengkapan','label'=>'Kelengkapan'])
@include('input_number', ['id'=>'pinjaman','label'=>'Pinjaman'])
@include('select', ['id'=>'tenor','label'=>'Pilih Tenor', 'selectData'=>$listTenor])
<div class="row form-group">
	<div class="col col-md-3">
	</div>
	<div class="col-12 col-md-9">
		<a href="#" id="cek-tempo" class="btn btn-primary btn-sm">Cek</a>
	</div>
</div>
@include('input', ['id'=>'jatuh_tempo','label'=>'Jatuh Tempo','readonly'=>true])
@include('input_number', ['id'=>'jumlah_tebus','label'=>'Jumlah Tebus','readonly'=>true])
@endcomponent
@endsection
@push('script')
<script>
	$('#cek-barang').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : '{{ url('barang/cek') }}'+'/'+$('#id_barang').val(),
			success : function(response, status){
				$('#cek-barang-view').replaceWith(response);
			}
		})
	});
	$('#cek-konsumen').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : '{{ url('konsumen/cek') }}'+'/'+$('#nik').val(),
			success : function(response, status){
				$('#cek-konsumen-view').replaceWith(response);
			}
		})
	});
	$('#cek-tempo').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : '{{ url('konsumen/cek') }}'+'/'+$('#nik').val(),
			success : function(response, status){
				var date = new Date();
				var tenor = Number($('#tenor').val());
				date.setDate(date.getDate() + tenor);
				var month = date.getMonth()+1;
				if(month<10){
					month='0'+month;
				}
				var tgl = date.getDate();
				if(tgl<10){
					tgl='0'+tgl;
				}
				var pinjaman = $('#pinjaman').val();
				if(pinjaman){
					var bunga = 0.05;
					if(tenor==30){
						bunga = 0.1;
					}
					$('#jumlah_tebus').val(Number(pinjaman)*(1+bunga));
				}
				$('#jatuh_tempo').val(date.getFullYear()+'-'+month+'-'+tgl);
			}
		})
	});
</script>
@endpush