<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Keuangan</title>
	<link rel="stylesheet" href="css/report.css">
</head>
<body>
	<h1 align="center"><u>Laporan Keuangan</u></h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tipe</th>
				<th>Tanggal</th>
				<th>Nama Konsumen</th>
				<th>Barang</th>
				<th>Pinjaman</th>
				<th>Bunga</th>
				<th>Denda</th>
				<th>Admin</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $d)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>Pelunasan</td>
				<td>{{ $d->tanggal_tebus }}</td>
				<td>{{ $d->konsumen->nama }}</td>
				<td>{{ $d->barang->nama }}</td>
				<td align="right">{{ $d->pinjaman_rp }}</td>
				<td align="right">{{ $d->bunga_rp }}</td>
				<td align="right">{{ $d->denda_rp }}</td>
				<td align="right">-</td>
				<td align="right">{{ $d->total_pelunasan_rp }}</td>
			</tr>
			@endforeach
			@foreach($data2 as $d)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>Perpanjangan</td>
				<td>{{ $d->tanggal }}</td>
				<td>{{ $d->order->konsumen->nama }}</td>
				<td>{{ $d->order->barang->nama }}</td>
				<td align="right">{{ $d->order->pinjaman_rp }}</td>
				<td align="right">{{ $d->bunga_baru_rp }}</td>
				<td align="right">{{ $d->denda_rp }}</td>
				<td align="right">{{ $d->admin_rp }}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>