@extends('theme::layouts.full-content')
@include('theme::commons.asset_highcharts')

@section('content')
@include('theme::plus.header_side')
<div class="mainpage">
	<div class="margin-side-10">
	<div class="mainbodyarea">
		<div class="bigarea hiddenrelative">
		<div class="bigarea-margin">
			<div class="col-default margin-top-10">
				<div class="bodypage bgwhite bordergrey">
					<div class="center-head bggrad-color2 flexcenter">
						<div class="icon-titlepage bgcolor-1 flexcenter"><svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z" /></svg></div>
						<h1>IDM</h1>
					</div>
					<div class="pagebox">
						<div class="statishead">
							<h1>Status IDM {{ ucwords(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }}</h1>
						</div>
						<div class="width-default">
							<div id="status-error" style="display: none;">
								<div class="box-body">
									<div class="alert alert-danger">
										<p id="error-message"></p>
									</div>
								</div>
							</div>
							<div class="rowsame margin-minlr-5">
								<div class="idm-box bgbiru">
										<div class="idm-head flexcenter">SKOR IDM SAAT INI</div>
										<div class="idm-inner">
										<p id="skor-saat-ini"></p>
										</div>
									</div>
									<div class="idm-box bgorange">
										<div class="idm-head flexcenter">STATUS IDM</div>
										<div class="idm-inner">
										<p id="status-saat-ini"></p>
										</div>
									</div>
									<div class="idm-box bgtoska">
										<div class="idm-head flexcenter">SKOR IDM MINIMAL</div>
										<div class="idm-inner">
										<p id="skor-minimal"></p>
										</div>
									</div>
									<div class="idm-box bgpink">
										<div class="idm-head flexcenter">TARGET STATUS</div>
										<div class="idm-inner">
										<p id="target-status"></p>
										</div>
									</div>
							</div>
							<div class="row" style="margin-left:-5px;margin-right:-5px;">
							<div class="col-sm-12" style="padding-left:5px;padding-right:5px;">
								<div class="table-responsive">
								<table class="table table-bordered table-striped dataTable table-hover tablesmall-text">
									<tbody>
										<tr>
											<td width="30%">PROVINSI</td>
											<td style="width:20px;text-align:center;">:</td>
											<td id="nama-provinsi"></td>
										</tr>
										<tr>
											<td>KABUPATEN</td>
											<td style="width:20px;text-align:center;">:</td>
											<td id="nama-kabupaten"></td>
										</tr>
										<tr>
											<td>{{ strtoupper(setting('sebutan_kecamatan')) }}</td>
											<td> : </td>
											<td id="nama-kecamatan"></td>
										</tr>
										<tr>
											<td>{{ strtoupper(setting('sebutan_desa')) }}</td>
											<td style="width:20px;text-align:center;">:</td>
											<td id="nama-desa"></td>
										</tr>
									</tbody>
								</table>
								</div>
								<figure class="highcharts-figure mt-15">
									<div id="container"></div>
								</figure>
								<figure class="highcharts-figure mt-15">
									<div id="container"></div>
								</figure>
								<div class="row">
									<div class="col-sm-12">
										<div class="table-responsive">
											<table class="table table-bordered dataTable table-striped table-hover" id="tabel-daftar">
												<thead class="bg-gray color-palette">
													<tr>
														<th rowspan="2" class="padat">NO</th>
														<th rowspan="2">INDIKATOR IDM</th>
														<th rowspan="2">SKOR</th>
														<th rowspan="2">KETERANGAN</th>
														<th rowspan="2" nowrap>KEGIATAN YANG DAPAT DILAKUKAN</th>
														<th rowspan="2">+NILAI</th>
														<th colspan="6" class="text-center">YANG DAPAT MELAKSANAKAN KEGIATAN</th>
													</tr>
													<tr>
														<th>PUSAT</th>
														<th>PROVINSI</th>
														<th>KABUPATEN</th>
														<th>DESA</th>
														<th>CSR</th>
														<th>LAINNYA</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('theme::plus.middle_page')
		</div>
		</div>
		<div class="rightsidearea">
			@include('theme::plus.side')			
		</div>
	</div>
	</div>
</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function () {
			var tahun = '{{ $tahun }}';
			var route = '{{ route('api.idm', $tahun) }}';

			$.get(route, function (data) {
				if (data['error_msg']) {
					$('#status-error').show();
					$('#status-idm').hide();
					$('#error-message').text(data['error_msg']);
					return;
				}

				$('#status-idm').show();
				$('#status-error').hide();

				var summaries = data['data'][0]['attributes']['SUMMARIES'];
				var row = data['data'][0]['attributes']['ROW'];
				var identitas = data['data'][0]['attributes']['IDENTITAS'][0];
				var iks = parseFloat(row[35].SKOR ?? 0);
				var ike = parseFloat(row[48].SKOR ?? 0);
				var ikl = parseFloat(row[52].SKOR ?? 0);
				console.log(row);
				

				// Skor
				$('#skor-saat-ini').text(parseFloat(summaries.SKOR_SAAT_INI).toFixed(4));
				$('#status-saat-ini').text(summaries.STATUS);
				$('#skor-minimal').text(parseFloat(summaries.SKOR_MINIMAL).toFixed(4));
				$('#target-status').text(summaries.TARGET_STATUS);

				// Highcharts
				loadHighcharts(tahun, iks, ike, ikl);

				// Identitas
				$('#nama-provinsi').text(identitas.nama_provinsi);
				$('#nama-kabupaten').text(identitas.nama_kab_kota);
				$('#nama-kecamatan').text(identitas.nama_kecamatan);
				$('#nama-desa').text(identitas.nama_desa);

				// Tabel
				row.forEach(item => {
					var tr = `
					<tr class="${item.NO ?? ''}">
						<td class="text-center">${item.NO ?? ''}</td>
						<td style="min-width: 150px;">${item.INDIKATOR?? ''}</td>
						<td class="padat">${item.SKOR ?? ''}</td>
						<td style="min-width: 250px;">${item.KETERANGAN ?? ''}</td>
						<td>${item.KEGIATAN ?? ''}</td>
						<td class="padat">${item.NILAI?? ''}</td>
						<td>${item.PUSAT ?? ''}</td>
						<td>${item.PROV ?? ''}</td>
						<td>${item.KAB ?? ''}</td>
						<td>${item.DESA ?? ''}</td>
						<td>${item.CSR  ?? ''}</td>
						<td>${item.LAINNYA}</td>
					</tr>
					`;

					$('#tabel-daftar tbody').append(tr);
				});
			}).fail(function (xhr, status, error) {
				$('#status-error').show();
				$('#status-idm').hide();
				$('#error-message').text('Data IDM tahun ' + tahun + ' tidak ditemukan.');
			});

			// Highcharts
			function loadHighcharts(tahun, iks, ike, ikl) {
				Highcharts.chart('container', {
					chart: {
						type: 'pie',
						options3d: {
							enabled: true,
							alpha: 45
						}
					},
					title: {
						text: 'Indeks Desa Membangun (IDM) ' + tahun
					},
					subtitle: {
						text: 'SKOR : IKS, IKE, IKL'
					},
					plotOptions: {
						series: {
							colorByPoint: true
						},
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							showInLegend: true,
							depth: 45,
							innerSize: 70,
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b>: {point.y:,.2f} / {point.percentage:.1f} %'
							}
						}
					},
					series: [{
						name: 'SKOR',
						shadow: 1,
						border: 1,
						data: [
							['IKS', parseFloat(iks)],
							['IKE', parseFloat(ike)],
							['IKL', parseFloat(ikl)]
						]
					}]
				});
			}
		});
		var config=@json(identitas());
	</script>
@endpush