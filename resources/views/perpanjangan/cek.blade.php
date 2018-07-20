<div id="cek-view">
	<input name="id_order_final" type="hidden" value="{{ $d->id }}">
	@include('static', ['value'=>$d->nota,'label'=>'Nota'])
	@include('static', ['value'=>$d->konsumen->nik,'label'=>'NIK'])
	@include('static', ['value'=>$d->konsumen->nama,'label'=>'Nama Konsumen'])
	@include('static', ['value'=>$d->konsumen->alamat,'label'=>'Alamat'])
	@include('static', ['value'=>$d->konsumen->no_hp,'label'=>'No Hp'])
	@include('static', ['value'=>$d->barang->nama,'label'=>'Nama Barang'])
	@include('static', ['value'=>$d->tahun,'label'=>'Tahun'])
	@include('static', ['value'=>$d->imei,'label'=>'Imei / Serial Number'])
	@include('static', ['value'=>$d->kelengkapan,'label'=>'Kelengkapan'])
	@include('static', ['value'=>$d->tenor.' hari','label'=>'Tenor'])
	@include('input_number', ['id'=>'pinjaman','value'=>$d->pinjaman,'label'=>'Pinjaman','readonly'=>true])
	@include('input', ['id'=>'bunga','value'=>$bunga,'label'=>'Bunga','readonly'=>true])
	@include('input', ['id'=>'denda','value'=>$denda,'label'=>'Denda','readonly'=>true])
	@include('input', ['id'=>'admin','value'=>$admin,'label'=>'Admin','readonly'=>true])
	@include('select', ['id'=>'tenor','label'=>'Pilih Tenor', 'selectData'=>$listTenor])
	@include('input', ['id'=>'jatuh_tempo','label'=>'Jatuh Tempo','readonly'=>true])
	<div class="row form-group">
		<div class="col col-md-3">
		</div>
		<div class="col-12 col-md-9">
			<a onclick="cekTempo(event)" href="#" id="cek-tempo" class="btn btn-primary btn-sm">Cek Tempo</a>
		</div>
	</div>
	@include('input_number', ['id'=>'jumlah_tebus','label'=>'Total Penebusan','readonly'=>true])
	@include('input_number', ['id'=>'bayar_skrg','label'=>'Jumlah Bayar Saat Ini','readonly'=>true])
</div>