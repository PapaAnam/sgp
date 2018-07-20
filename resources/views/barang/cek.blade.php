<div class="row" id="cek-barang-view">
	<div class="col-md-12">
		<table class="table table-striped table-bordered">
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
			</tbody>
		</table>
	</div>
</div>