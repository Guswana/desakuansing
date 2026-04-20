@extends('theme::layouts.right-sidebar')

@section('content')
@include('theme::plus.header_side')
<div class="mainpage">
	<div class="margin-side-10">
	<div class="mainbodyarea">
		<div class="bigarea hiddenrelative">
		<div class="bigarea-margin">
			<div class="col-default margin-top-10">
				<div class="bodypage bgwhite bordergrey">
				<div class="headstat-lebar flexcenter" style="margin-bottom:10px;">
						<img src="{{ theme_asset('images/map.png') }}"/>
						<div>
						<h1 class="color-1">Populasi Wilayah</h1>
						</div>
					</div>
				<div class="padding-leftright-10">
					
					<div class="table-responsive">
					  <table class="table table-striped table-bordered" id="tabelData">
						<thead>
							<tr>
								<th>No</th>
								<th colspan="8">Wilayah / Ketua</th>
								<th class="text-center">KK</th>
								<th class="text-center">L+P</th>
								<th class="text-center">L</th>
								<th class="text-center">P</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					</div>
				</div>
				</div>
			</div>
			@include('theme::plus.middle_page')
		</div>
		</div>
		<div class="rightsidearea">
			@include('theme::partials.statistik.statistik_nav')
			@include('theme::plus.side')
		</div>
	</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var tabelData  = $('#tabelData');
        var wilayahHTML = '';
        
        function loadWilayah() {
            
            var apiWilayah = '{{ route("api.wilayah.administratif") }}';

            $.get(apiWilayah, function (response) {

                var wilayah = response.data;

                tabelData.find('tbody').empty();
                tabelData.find('tfoot').empty();

                if (!wilayah.length) {
                    tabelData.find('tbody').append('<tr><td colspan="13" class="text-center">Tidak ada data wilayah yang tersedia</td></tr>');
                    return;
                }

                loadDusun(wilayah);
            });
        }

        // Tingkat 1 : Dusun
        function loadDusun(data) {
            let no = 1;
            let totalKK = 0;
            let totalPriaWanita = 0;
            let totalPria = 0;
            let totalWanita = 0;

            data.forEach(function (item, index) {
                var row = `<tr>
                    <td class="text-center">${no}</td>
                    <td colspan="8">${item.attributes.sebutan_dusun + ' ' + item.attributes.dusun + item.attributes.kepala_nama}</td>
                    <td class="text-right">${item.attributes.keluarga_aktif_count}</td>
                    <td class="text-right">${item.attributes.penduduk_pria_wanita_count}</td>
                    <td class="text-right">${item.attributes.penduduk_pria_count}</td>
                    <td class="text-right">${item.attributes.penduduk_wanita_count}</td>
                </tr>`;

                wilayahHTML += row;
                totalKK += item.attributes.keluarga_aktif_count;
                totalPriaWanita += item.attributes.penduduk_pria_wanita_count;
                totalPria += item.attributes.penduduk_pria_count;
                totalWanita += item.attributes.penduduk_wanita_count;
                no++;

                loadRW(item.attributes.rws);
            });

            tabelData.find('tbody').append(wilayahHTML);

            let totalPW = totalPria + totalWanita;
            var tfoot = `<tr style="font-weight:bold;">
                <td class="text-center" colspan="9">TOTAL</td>
                <td class="text-right">${totalKK}</td>
                <td class="text-right">${totalPW}</td>
                <td class="text-right">${totalPria}</td>
                <td class="text-right">${totalWanita}</td>
            </tr>`;

            tabelData.find('tbody').after(tfoot);
        }

        // Tingkat 2 : RW
        function loadRW(data) {
            let no = 1;

            data.forEach(function (item) {
                if (item.rw !== '-') {
                    let row = `
                        <tr>
                            <td></td>
                            <td class="text-center">${no}</td>
                            <td colspan="7">${item.sebutan_rw + ' ' + item.rw + item.kepala_nama}</td>
                            <td class="text-right">${item.keluarga_aktif_count}</td>
                            <td class="text-right">${item.penduduk_pria_wanita_count}</td>
                            <td class="text-right">${item.penduduk_pria_count}</td>
                            <td class="text-right">${item.penduduk_wanita_count}</td>
                        </tr>`;

                    wilayahHTML += row;
                    no++;
                }

                loadRT(item.rw, item.rts);
            });
        }

        // Tingkat 3 : RT
        function loadRT(rw, data) {
            let no = 1;

            data.forEach(function (item) {
                if (rw == item.rw && item.rt !== '-') {
                    let row = `
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-center">${no}</td>
                            <td colspan="6">${item.sebutan_rt + ' ' + item.rt + item.kepala_nama}</td>
                            <td class="text-right">${item.keluarga_aktif_count}</td>
                            <td class="text-right">${item.penduduk_pria_wanita_count}</td>
                            <td class="text-right">${item.penduduk_pria_count}</td>
                            <td class="text-right">${item.penduduk_wanita_count}</td>
                        </tr>`;

                    wilayahHTML += row;
                    no++;
                }
            });
        }

        loadWilayah();
    });var config=@json(identitas());
</script>
@endpush