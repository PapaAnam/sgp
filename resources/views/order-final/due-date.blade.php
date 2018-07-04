<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Due Date</title>
	<link rel="stylesheet" href="css/report.css">
</head>
<body>
	<h1 align="center"><u>Laporan Due Date</u></h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Due Date</th>
				<th>Nama Konsumen</th>
				<th>Barang</th>
				<th>Pinjaman</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $d)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $d->tanggal }}</td>
				<td>{{ $d->tanggal_tebus }}</td>
				<td>{{ $d->konsumen->nama }}</td>
				<td>{{ $d->barang->nama }}</td>
				<td>{{ $d->pinjaman_rp }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>