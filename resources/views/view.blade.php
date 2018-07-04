<div class="row">
	<div class="col-md-12">
		@if(session('success_msg'))
		<div class="alert alert-success">
			{{ session('success_msg') }}
		</div>
		@endif
		<div class="card">
			<div class="card-header">
				<strong class="card-title">{{ $title }}</strong>
				<a href="{{ $tambahUrl }}" class="btn btn-primary btn-sm float-right">Tambah</a>
			</div>
			<div class="card-body">
				{{ $slot }}				
			</div>
		</div>
	</div>
</div>