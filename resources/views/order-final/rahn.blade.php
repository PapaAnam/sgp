<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Rahn</title>
	<link rel="stylesheet" href="css/report.css">
</head>
<body>
	<h1 align="center"><u>Laporan Rahn</u></h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal</th>
				<th>Nama Konsumen</th>
				<th>Barang</th>
				<th>Pinjaman</th>
				<th>Bunga</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $d)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $d->tanggal }}</td>
				<td>{{ $d->konsumen->nama }}</td>
				<td>{{ $d->barang->nama }}</td>
				<td align="right">{{ $d->pinjaman_rp }}</td>
				<td align="right">{{ number_format($d->jumlah_tebus - $d->pinjaman, 2, ',', '.') }}</td>
			</tr>
			@endforeach
			<tr style="font-weight: bold;">
				<td colspan="2">Total</td>
				<td align="right">Total Konsumen</td>
				<td align="right">Total Barang</td>
				<td align="right">Total Pinjaman</td>
				<td align="right">Total Bunga</td>
			</tr>
			<tr>
				<td colspan="2" align="right">{{ $total }}</td>
				<td align="right">{{ $total }}</td>
				<td align="right">{{ $total }}</td>
				<td align="right">{{ number_format($total_pinjaman, 2, ',', '.') }}</td>
				<td align="right">{{ number_format($total_bunga, 2, ',', '.') }}</td>
			</tr>
		</tbody>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>