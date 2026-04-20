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
						<div class="statishead"><h1>Data Inventaris {{ ucwords(setting('sebutan_desa')) }}</h1></div>
						<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered" id="inventaris">
										<thead class="bg-gray">
											<tr>
												<th class="text-center" rowspan="3" style="vertical-align: middle;">No</th>
												<th class="text-center" rowspan="3" style="vertical-align: middle;">Jenis Barang</th>
												<th class="text-center" width="340%" rowspan="3" style="vertical-align: middle;">Keterangan</th>
												<th class="text-center" colspan="5" style="vertical-align: middle;">Asal barang</th>
												<th class="text-center" rowspan="3" style="vertical-align: middle;">Aksi</th>
											</tr>
											<tr>
												<th class="text-center" rowspan="2">Dibeli Sendiri</th>
												<th class="text-center" colspan="3">Bantuan</th>
												<th class="text-center" style="text-align:center;" rowspan="2">Sumbangan</th>
											</tr>
											<tr>
												<th class="text-center" >Pemerintah</th>
												<th class="text-center" >Provinsi</th>
												<th class="text-center" >Kabupaten</th>
											</tr>
										</thead>
										<tbody id="inventaris-tbody">
											
										</tbody>
										<tfoot id="inventaris-tfoot">
											<tr>
												<th colspan="3" class="text-center">Total</th>
												<th class="pribadi"></th>
												<th class="pemerintah"></th>
												<th class="provinsi"></th>
												<th class="kabupaten"></th>
												<th class="sumbangan"></th>
												<th></th>
											</tr>
										</tfoot>
									</table>
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
        const _url =  `{{ ci_route('internal_api.inventaris') }}`
        const _tbody = document.getElementById('inventaris-tbody')
        const _tfoot = document.getElementById('inventaris-tfoot')
        $.ajax({
            url: _url,
            type: 'GET',
            beforeSend: () => _tbody.innerHTML = `@include('theme::commons.loading')`,
            success: (response) => {
                let _trString = []
                let _total = {'pribadi' : 0, 'pemerintah' : 0, 'provinsi' : 0, 'kabupaten' : 0, 'sumbangan' : 0}
            
                response.data[0].attributes.forEach((element, key) => {                
                    _trString.push(`<tr>
                        <td>${key + 1}</td>
                        <td>${element.jenis}</td>
                        <td>${element.ket}</td>
                        <td>${element.pribadi}</td>
                        <td>${element.pemerintah}</td>
                        <td>${element.provinsi}</td>
                        <td>${element.kabupaten}</td>
                        <td>${element.sumbangan}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="${element.url}" title="Lihat Data" type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>`)
                    for(let i in _total){
                        _total[i] += element[i]
                    }                
                });
                for(let i in _total){                
                    _tfoot.querySelector(`th.${i}`).innerHTML = _total[i]
                }            
                _tbody.innerHTML = _trString.join('')    
                
                setTimeout($('#inventaris').DataTable(), 1000)
            },
            dataType: 'json'
        })               
    });
	var config=@json(identitas());
</script>
@endpush
