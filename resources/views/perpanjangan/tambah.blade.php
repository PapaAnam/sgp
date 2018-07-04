@extends('layouts.app')
@section('content')
@component('tambah', ['title' => $title,'action'=>$action,'back_url'=>$back_url])
@include('select', ['id'=>'order_final_id','label'=>'Pilih Nota', 'selectData'=>$listOrderFinal])
<div id="cek-view"></div>
<div class="row form-group">
	<div class="col col-md-3">
	</div>
	<div class="col-12 col-md-9">
		<a href="#" id="cek" class="btn btn-primary btn-sm">Cek</a>
	</div>
</div>
@endcomponent
@endsection
@push('script')
<script>
	$('#cek').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url : '{{ url('perpanjangan/cek') }}'+'/'+$('#order_final_id').val(),
			success : function(response, status){
				$('#cek-view').replaceWith(response);
			}
		})
	});
	function cekTempo(e){
		e.preventDefault();
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
		$('#jatuh_tempo').val(date.getFullYear()+'-'+month+'-'+tgl);
		var tenor = Number($('#tenor').val());
		var pinjaman = $('#pinjaman').val();
		if(pinjaman){
			var bunga = 0.05;
			if(tenor==30){
				bunga = 0.1;
			}
			$('#jumlah_tebus').val(Math.round(Number(pinjaman)*(1+bunga)));
		}
	}
</script>
@endpush