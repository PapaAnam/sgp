<!DOCTYPE html>
<html>
<head>
	<title>Cetak Struk Perpanjangan</title>
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
	<h1 align="center"><u>Struk Perpanjangan</u></h1>
	<table>
		@include('tr-td', ['value'=>$d->order->nota,'label'=>'Nota'])
		@include('tr-td', ['value'=>$d->order->konsumen->nik,'label'=>'NIK'])
		@include('tr-td', ['value'=>$d->order->konsumen->nama,'label'=>'Nama Konsumen'])
		@include('tr-td', ['value'=>$d->order->konsumen->alamat,'label'=>'Alamat'])
		@include('tr-td', ['value'=>$d->order->konsumen->no_hp,'label'=>'No Hp'])
		@include('tr-td', ['value'=>$d->order->barang->nama,'label'=>'Nama Barang'])
		@include('tr-td', ['value'=>$d->order->tahun,'label'=>'Tahun'])
		@include('tr-td', ['value'=>$d->order->imei,'label'=>'Imei / Serial Number'])
		@include('tr-td', ['value'=>$d->order->kelengkapan,'label'=>'Kelengkapan'])
		@include('tr-td', ['value'=>$d->order->tenor.' hari','label'=>'Tenor'])
		@include('tr-td', ['value'=>$d->order->jatuh_tempo,'label'=>'Jatuh Tempo'])
		@include('tr-td', ['value'=>$d->order->pinjaman_rp,'label'=>'Pinjaman'])
		@include('tr-td', ['value'=>$d->bunga_rp,'label'=>'Bunga'])
		@include('tr-td', ['value'=>$d->denda_rp,'label'=>'Denda'])
		@include('tr-td', ['value'=>$d->admin_rp,'label'=>'Admin'])
		@include('tr-td', ['value'=>$d->order->jumlah_tebus_rp,'label'=>'Jumlah Bayar'])
		@include('tr-td', ['value'=>$d->tenor.' hari','label'=>'Tenor Baru'])
		@include('tr-td', ['value'=>$d->jatuh_tempo,'label'=>'Jatuh Tempo Baru'])
		@include('tr-td', ['value'=>$d->order->pinjaman_rp,'label'=>'Pinjaman'])
		@include('tr-td', ['value'=>$d->bunga_baru_rp,'label'=>'Bunga Baru'])
		@include('tr-td', ['value'=>$d->jumlah_tebus_rp,'label'=>'Jumlah Pelunasan Baru'])
		@include('tr-td', ['value'=>$d->jumlah_bayar_rp,'label'=>'Total Bayar Perpanjangan'])
	</table>
	<script>
		window.print()
	</script>
</body>
</html>