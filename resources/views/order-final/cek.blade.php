<div id="cek-view">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">Perpanjangan : {{ $perpanjangan }} x</div>
		</div>
	</div>
	@include('static', ['value'=>$d->nota,'label'=>'Nota'])
	@include('static', ['value'=>$d->konsumen->nik,'label'=>'NIK'])
	@include('static', ['value'=>$d->konsumen->nama,'label'=>'Nama Konsumen'])
	@include('static', ['value'=>$d->konsumen->alamat,'label'=>'Alamat'])
	@include('static', ['value'=>$d->konsumen->no_hp,'label'=>'No Hp'])
	@include('static', ['value'=>$d->barang->nama,'label'=>'Nama Barang'])
	@include('static', ['value'=>$d->tahun,'label'=>'Tahun'])
	@include('static', ['value'=>$d->imei,'label'=>'Imei / Serial Number'])
	@include('static', ['value'=>$d->kelengkapan,'label'=>'Kelengkapan'])
	@include('static', ['value'=>$tenor.' hari','label'=>'Tenor'])
	@include('static', ['value'=>$jatuh_tempo,'label'=>'Jatuh Tempo'])
	@include('static', ['value'=>$d->pinjaman_rp,'label'=>'Pinjaman'])
	@include('input', ['id'=>'bunga','value'=>$bunga,'label'=>'Bunga','readonly'=>true])
	@include('input', ['id'=>'denda','value'=>$denda,'label'=>'Denda','readonly'=>true])
	@include('input', ['id'=>'total_pelunasan','value'=>$total_bayar,'label'=>'Jumlah Bayar','readonly'=>true])
</div>