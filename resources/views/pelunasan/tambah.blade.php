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
			url : '{{ url('order-final/cek') }}'+'/'+$('#order_final_id').val(),
			success : function(response, status){
				$('#cek-view').replaceWith(response);
			}
		})
	});
</script>
@endpush