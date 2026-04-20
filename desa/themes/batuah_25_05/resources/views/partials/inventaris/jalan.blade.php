@extends('theme::layouts.right-sidebar')
@include('core::admin.layouts.components.asset_numeral')

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
						<div class="icon-titlepage bgcolor-1 flexcenter"><svg viewBox="0 0 24 24"><path d="M21 10V9L15 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H11V19.13L19.39 10.74C19.83 10.3 20.39 10.06 21 10M14 4.5L19.5 10H14V4.5M22.85 14.19L21.87 15.17L19.83 13.13L20.81 12.15C21 11.95 21.33 11.95 21.53 12.15L22.85 13.47C23.05 13.67 23.05 14 22.85 14.19M19.13 13.83L21.17 15.87L15.04 22H13V19.96L19.13 13.83Z" /></svg></div>
						<h1>Inventaris</h1>
					</div>
					<div class="pagebox gridstyle artikelpage">
						<div class="statishead"><h1>Data {{ $judul }}</h1></div>
						<div class="box-body">
        <div class="table-responsive">
            <table id="inventaris" class="table table-bordered dataTable table-hover">
                <thead class="bg-gray">
                    <tr>
                        <th class="text-center" rowspan="2">No</th>
                        <th class="text-center" rowspan="2">Nama Barang</th>
                        <th class="text-center" rowspan="2">Kode Barang / Nomor Registrasi</th>
                        <th class="text-center" rowspan="2">Kondisi (B, KB, RB)</th>
                        <th class="text-center" rowspan="2">Jenis Konstruksi</th>
                        <th class="text-center" rowspan="2">Luas (M<sup>2</sup>)</th>
                        <th class="text-center" colspan="2">Dokumen Kepemilikan</th>
                        <th class="text-center" rowspan="2">Status Tanah</th>
                        <th class="text-center" rowspan="2">Asal Usul</th>
                        <th class="text-center" rowspan="2">Harga (Rp)</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="text-align:center;" rowspan="1">Tanggal</th>
                        <th class="text-center" style="text-align:center;" rowspan="1">Nomor</th>
                    </tr>
                </thead>
                <tbody id="inventaris-tbody">
                    
                                        
                </tbody>
                
                    <tfoot id="inventaris-tfoot">
                        <tr>
                            <th colspan="10" class="text-right">Total:</th>
                            <th class="total"></th>
                        </tr>
                    </tfoot>
                
            </table>
        </div>
    </div>
					</div>
				</div>
			</div>
			@include('theme::plus.middle_page')
		</div>
		</div>
		<div class="rightsidearea" style="padding-top:25px;">
			@include('theme::plus.side')
		</div>
	</div>
	</div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            const _url = `{{ ci_route('internal_api.inventaris-jalan') }}`
            const _tbody = document.getElementById('inventaris-tbody')
            const _tfoot = document.getElementById('inventaris-tfoot')
            $.ajax({
                url: _url,
                type: 'GET',
                beforeSend: () => _tbody.innerHTML = `@include('theme::commons.loading')`,
                success: (response) => {
                    let _trString = []
                    let _total = 0
                    if (response.data.length) {
                        response.data.forEach((element, key) => {
                            _trString.push(`<tr>
                            <td>${key + 1}</td>                                                                                                                                    
                            <td>${element.attributes.nama_barang}</td>
                            <td>${element.attributes.kode_barang}<br>${element.attributes.register}</td>
                            <td>${element.attributes.kondisi}</td>
                            <td>${element.attributes.kontruksi}</td>
                            <td>${element.attributes.luas}</td>
                            <td>${element.attributes.tanggal_dokument}</td>
                            <td>${element.attributes.no_dokument}</td>
                            <td>${element.attributes.status_tanah}</td>
                            <td>${element.attributes.asal}</td>
                            <td>${element.attributes.harga_format}</td>
                        </tr>`)
                            _total += element.attributes.harga
                        });
                        _tfoot.querySelector(`th.total`).innerHTML = numeral(_total).format()
                        _tbody.innerHTML = _trString.join('')
                    } else {
                        _tfoot.remove()
                        _tbody.innerHTML = ''
                    }
                    setTimeout(() => {
                        $('#inventaris').DataTable({
                            columnDefs: [{
                                targets: [0],
                                orderable: false
                            }],
                            order: [
                                [1, 'asc']
                            ]
                        });
                    }, 1000);
                },
                dataType: 'json'
            })
        });
    </script>
@endpush
