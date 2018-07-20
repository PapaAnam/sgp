<!DOCTYPE html>
<html>
<head>
	<title>Cetak Struk Order Final</title>
	<style>
	body {
		font-family: sans-serif;
	}
	.header {
		padding-bottom: 30px;
		font-size: 10px;
	}
	.header h1 {
		text-align: center;
	}
	.tbl {
		border-collapse: collapse;
	}
	.tbl td, th {
		border: 1px solid black;
		padding: 7px;
	}
	.midt {
		width: 100%;
		margin: 0;
	}
	.midt td, .midt th {
		border: 0;
		padding: 0;
	}
	td {
		padding: 5px;
		padding-right: 20px;
	}
</style>
</head>
<body>
	<h1 align="center"><u>Struk Order Final</u></h1>
	<table>
		@include('tr-td', ['value'=>$d->nota,'label'=>'Nota'])
		@include('tr-td', ['value'=>$d->konsumen->nik,'label'=>'NIK'])
		@include('tr-td', ['value'=>$d->konsumen->nama,'label'=>'Nama Konsumen'])
		@include('tr-td', ['value'=>$d->konsumen->alamat,'label'=>'Alamat'])
		@include('tr-td', ['value'=>$d->konsumen->no_hp,'label'=>'No Hp'])
		@include('tr-td', ['value'=>$d->barang->nama,'label'=>'Nama Barang'])
		@include('tr-td', ['value'=>$d->tahun,'label'=>'Tahun'])
		@include('tr-td', ['value'=>$d->imei,'label'=>'Imei / Serial Number'])
		@include('tr-td', ['value'=>$d->kelengkapan,'label'=>'Kelengkapan'])
		@include('tr-td', ['value'=>$d->pinjaman_rp,'label'=>'Pinjaman'])
		@include('tr-td', ['value'=>$d->tenor.' hari','label'=>'Tenor'])
		@include('tr-td', ['value'=>$d->jatuh_tempo,'label'=>'Jatuh Tempo'])
		@include('tr-td', ['value'=>$d->jumlah_tebus_rp,'label'=>'Jumlah Tebus'])
	</table>
	<script>
		window.print()
	</script>
</body>
</html>