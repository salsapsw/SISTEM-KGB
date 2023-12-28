<!DOCTYPE html>
<html>
<head>
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
		<h3>Penjagaan Kenaikan Gaji Berkala</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Pangkat</th>
				<th>Golongan</th>
				<th>Nomor SK</th>
				<th>Tanggal SK</th>
                <th>TMT SK</th>
                <th>Masa Kerja</th>
                <th>Gaji Pokok</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($penjagaan as $item )
			<tr>
				<th scope="row">{{ $loop->iteration }}</th>
				<td>{{ $item->nama }}</td>
                <td>{{ $item->pangkat }}</td>
                <td>{{ $item->golongan }}</td>
                <td>{{ $item->no_sk }}</td>                        
                <td>{{ $item->tgl_sk }}</td>
                <td>{{ $item->tmt_sk }}</td>
                <td>{{ $item->masa_kerja }}</td>
                <td>{{ $item->gaji }}</td>
			</tr>
			@empty
			@endforelse
		</tbody>
	</table>
</body>
</html>
