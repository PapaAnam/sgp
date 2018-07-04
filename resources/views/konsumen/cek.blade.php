<div class="row" id="cek-konsumen-view">
	<div class="col-md-12">
		<table class="table table-striped table-bordered">
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
			</tbody>
		</table>
	</div>
</div>