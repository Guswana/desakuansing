<table class="table-noline" width="100%">
		<tr><td>Nama {{ ucwords(setting('sebutan_desa')) }}</td><td style="width:10px;text-align:center;">:</td><td><b>{{ ucwords($desa['nama_desa']) }}</b></td></tr>
		<tr><td>Kode {{ ucwords(setting('sebutan_desa')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_desa'] }}</td></tr>
		<tr><td>{{ ucwords(setting('sebutan_kecamatan')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ ucwords($desa['nama_kecamatan']) }}</td></tr>
		<tr><td>Kode {{ ucwords(setting('sebutan_kecamatan')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_kecamatan'] }}</td></tr>
		<tr><td>{{ ucwords(setting('sebutan_kabupaten')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ ucwords($desa['nama_kabupaten']) }}</td></tr>
		<tr><td>Kode {{ ucwords(setting('sebutan_kabupaten')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_kabupaten'] }}</td></tr>
		<tr><td>Provinsi</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['nama_propinsi'] }}</td></tr>
		<tr><td>Kode Provinsi</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_propinsi'] }}</td></tr>
		<tr><td>Kode Pos</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_pos'] }}</td></tr>
	</table>