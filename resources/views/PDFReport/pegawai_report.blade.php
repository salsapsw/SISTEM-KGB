<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pegawai</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h3>Daftar Pegawai</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIP</th>
				<th>Email</th>
				<th>Bidang</th>
				<th>Jenis Kelamin</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($pegawai as $item )
			<tr>
				<th scope="row">{{ $loop->iteration }}</th>
				<td>{{ $item->nama }}</td>
				<td>{{ $item->profil->NIP }}</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->divisi->nama_divisi }}</td>
				<td>{{ $item->profil->jenis_kelamin }}</td>
			</tr>
			@empty
			@endforelse
		</tbody>
	</table>
</body>
</html>
