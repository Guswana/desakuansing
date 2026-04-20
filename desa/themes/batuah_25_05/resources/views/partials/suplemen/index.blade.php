@extends('theme::layouts.right-sidebar')
@include('theme::commons.asset_sweetalert')

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
						<h1>Suplemen</h1>
					</div>
					<div class="pagebox gridstyle artikelpage">
						<div class="statishead"><h1 id="judul"></h1></div>
						<table class="tablestatis" style="width:100%;">
							<tr>
								<td>Nama</td>
								<td style="width:10px;text-align:center;">:</td>
								<td id="nama"></td>
							</tr>
							<tr>
								<td>Sasaran Terdata</td>
								<td style="width:10px;text-align:center;">:</td>
								<td id="sasaran"></td>
								{{-- <td>{{ App\Enums\SasaranEnum::valueOf($suplemen->sasaran) }}</td> --}}
							</tr>
							<tr>
								<td>Keterangan</td>
								<td style="width:10px;text-align:center;">:</td>
								<td id="keterangan"></td>
							</tr>
						</table>
						<div class="headborder bordergrey1 flexcenter" style="margin-top:20px;"><h2 class="bordercolor-1">Daftar Terdata</h2></div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="tabelData">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tempat Lahir</th>
										<th>Jenis-kelamin</th>
										<th>Alamat</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
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
        var apiSuplemen = `{{ route('api.suplemen') }}`;
        var params = {
            "filter[slug]": `{{ $slug }}`
        }

        $.get(apiSuplemen, params, function (response) {
            suplemen = response.data[0];

            if (!suplemen) {
                Swal.fire('Error', 'Data tidak ditemukan.', 'error');
                return;
            }

            $('#judul').text('Data Suplemen' + suplemen.attributes.nama);
            $('#nama').text(suplemen.attributes.nama);
            $('#sasaran').text(suplemen.attributes.nama_sasaran);
            $('#keterangan').text(suplemen.attributes.keterangan);

            loadAnggota(suplemen.id);
        });

        function loadAnggota(id) {
            var routeSuplemenAnggota = `{{ route('api.suplemen') }}` + '/' + id;

            var tabelData = $('#tabelData').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ordering: true,
                ajax: {
                    url: routeSuplemenAnggota,
                    method: 'GET',
                    data: row => ({
                        "page[size]": row.length,
                        "page[number]": (row.start / row.length) + 1,
                        "filter[search]": row.search.value,
                        "sort": `${row.order[0]?.dir === "asc" ? "" : "-"}${row.columns[row.order[0]?.column]?.name}`
                    }),
                    dataSrc: json => {
                        json.recordsTotal = json.meta.pagination.total;
                        json.recordsFiltered = json.meta.pagination.total;
                        return json.data;
                    },
                    error: function (xhr) {
                        console.error('AJAX Error:', xhr.responseText);
                        Swal.fire('Error', 'Terjadi kesalahan saat memuat data.', 'error');
                    }
                },
                columnDefs: [{
                    targets: '_all',
                    className: 'text-nowrap'
                }, ],
                columns: [{
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'text-center'
                    },
                    {
                        data: "attributes.terdata_nama",
                        name: 'tweb_penduduk.nama',
                    },
                    {
                        data: "attributes.tempatlahir",
                        name: 'tweb_penduduk.tempatlahir',
                    },
                    {
                        data: "attributes.sex",
                        name: 'tweb_penduduk.sex',
                    },
                    {
                        data: "attributes.alamat",
                        name: 'tweb_penduduk.alamat',
                        orderable: false
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                drawCallback: function (settings) {
                    var api = this.api();
                    api.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function (cell, i) {
                        cell.innerHTML = api.page.info().start + i + 1;
                    });
                }
            });
        }
    });
</script>
@endpush