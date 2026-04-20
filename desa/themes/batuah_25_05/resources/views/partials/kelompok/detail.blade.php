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
						<div class="icon-titlepage bgcolor-1 flexcenter"><svg viewBox="0 0 24 24"><path d="M5 6C3.9 6 3 6.9 3 8S3.9 10 5 10 7 9.11 7 8 6.11 6 5 6M12 4C10.9 4 10 4.89 10 6S10.9 8 12 8 14 7.11 14 6 13.11 4 12 4M19 2C17.9 2 17 2.9 17 4S17.9 6 19 6 21 5.11 21 4 20.11 2 19 2M3.5 11C2.67 11 2 11.67 2 12.5V17H3V22H7V17H8V12.5C8 11.67 7.33 11 6.5 11H3.5M10.5 9C9.67 9 9 9.67 9 10.5V15H10V20H14V15H15V10.5C15 9.67 14.33 9 13.5 9H10.5M17.5 7C16.67 7 16 7.67 16 8.5V13H17V18H21V13H22V8.5C22 7.67 21.33 7 20.5 7H17.5Z" /></svg></div>
						<h1>Kelompok</h1>
					</div>
					<div class="pagebox gridstyle artikelpage">
						<div class="single_page_area" id="kelompok-wrapper">
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
	<script>
        $(document).ready(function() {
            var route = "{{ route('api.' . $tipe . '.detail', ['slug' => $slug]) }}";
            $.ajax({
                url: route,
                method: 'GET',
                beforeSend: function() {
                    $('#kelompok-wrapper').html(`<div class="fa fa-circle-o-notch fa-spin fa-4x" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
                },
                success: function(data) {
                    var detail = data.data.attributes;
                    var pengurus = detail.pengurus;
                    var tipe = detail.tipe;
                    var gambar_desa = detail.logo;

                    var detailElemen = `
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tbody>
                                <tr>
                                    <td width="20%">Nama ${tipe}</td>
                                    <td width="1%">:</td>
                                    <td><b>${detail.nama}</b></td>
                                    <td width="20%" rowspan="5" style="text-align: center; vertical-align: top;">
                                        <img src="${gambar_desa}" alt="Logo ${tipe}" height="120px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kode ${tipe}</td>
                                    <td>:</td>
                                    <td>${detail.kode}</td>
                                </tr>
                                <tr>
                                    <td>Kategori ${tipe}</td>
                                    <td>:</td>
                                    <td>${detail.kategori}</td>
                                </tr>
                                <tr>
                                    <td>No. SK Pendirian</td>
                                    <td>:</td>
                                    <td>${detail.no_sk_pendirian}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>${detail.keterangan}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>`;

                    var pengurusElemen = `<div class="headborder bordergrey flexcenter" style="margin-top:20px;"><h2 class="bordercolor-1">Daftar Pengurus</h2></div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-pengurus">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    pengurus.forEach((data, key) => {
                        pengurusElemen += `
                                    <tr>
                                        <td>${key + 1}</td>
                                        <td>${data.nama_jabatan}</td>
                                        <td nowrap>${data.nama_penduduk}</td>
                                        <td>${data.alamat_lengkap}</td>
                                    </tr>`;
                    });

                    pengurusElemen += `</tbody>
                        </table>
                    </div>`;

                    var anggotaElemen = `
                    <div class="headborder bordergrey flexcenter" style="margin-top:20px;"><h2 class="bordercolor-1">Daftar Anggota</h2></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-anggota">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Anggota</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                `;

                    $('#kelompok-wrapper').html(detailElemen + pengurusElemen + anggotaElemen);

                    anggotaTable();
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    Swal.fire('Error', 'Terjadi kesalahan saat memuat data.', 'error');
                }
            });


            const anggotaTable = () => {
                $('#table-anggota').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ordering: true,
                    ajax: {
                        url: `{{ route('api.kelompok.anggota', ['slug' => $slug]) }}`,
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
                        error: function(xhr) {
                            console.error('AJAX Error:', xhr.responseText);
                            Swal.fire('Error', 'Terjadi kesalahan saat memuat data.', 'error');
                        }
                    },
                    columnDefs: [{
                            targets: '_all',
                            className: 'text-nowrap'
                        },
                        {
                            targets: [0, 4],
                            className: 'text-center'
                        },
                        {
                            targets: [0],
                            orderable: false
                        }
                    ],
                    columns: [{
                            data: null,
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'no_anggota',
                            name: 'no_anggota',
                            render: (data, type, row) => row.attributes.no_anggota
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            className: 'text-wrap',
                            render: (data, type, row) => row.attributes.anggota.nama
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
                            render: (data, type, row) => row.attributes.alamat_lengkap
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin',
                            render: (data, type, row) => row.attributes.sex
                        },
                    ],
                    order: [
                        [2, 'desc']
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        api.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = api.page.info().start + i + 1;
                        });
                    }
                });
            }
        });
    </script>




    <script>
        $(document).ready(function() {
            var route = "{{ route('api.' . $tipe . '.detail', ['slug' => $slug]) }}";
            $.ajax({
                url: route,
                method: 'GET',
                beforeSend: function() {
                    const kelompokList = document.getElementById('kelompok-wrapper');
                    kelompokList.innerHTML = `@include('theme::commons.loading')`;
                },
                success: function(data) {
                    var detail = data.data.attributes;
                    var pengurus = detail.pengurus;
                    var tipe = detail.tipe;
                    var gambar_desa = detail.logo;

                    $('#nav-tipe').text(`Data ${tipe}`);

                    var detailElemen = `
					<div class="statishead">
					<h1>Data ${tipe} ${detail.nama}</h1>
				</div>	
              
              <div class="table-responsive content">
                <table class="w-full text-sm">
                  <tbody>
                    <tr>
                      <td width="20%">Nama ${tipe}</td>
                      <td width="1%">:</td>
                      <td>${detail.nama}</td>
                      <td width="20%" rowspan="5" style="text-align: center; vertical-align: middle;">
                        <img src="${gambar_desa}" alt="Logo ${tipe}" class="w-full">
                      </td>
                    </tr>
                    <tr>
                      <td>Kode ${tipe}</td>
                      <td>:</td>
                      <td>${detail.kode}</td>
                    </tr>
                    <tr>
                      <td>Kategori ${tipe}</td>
                      <td>:</td>
                      <td>${detail.kategori}</td>
                    </tr>
                    <tr>
                      <td>No. SK Pendirian</td>
                      <td>:</td>
                      <td>${detail.no_sk_pendirian}</td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td>${detail.keterangan}</td>
                    </tr>
                  </tbody>
                </table>
              </div>`;

                    var pengurusElemen = `<div class="headborder bordergrey flexcenter" style="margin-top:20px;"><h2 class="bordercolor-1">Daftar Pengurus</h2></div>
              <div class="table-responsive content">
                <table class="w-full text-sm">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jabatan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>`;

                    pengurus.forEach((data, key) => {
                        pengurusElemen += `
                    <tr>
                      <td>${key + 1}</td>
                      <td>${data.nama_jabatan}</td>
                      <td nowrap>${data.nama_penduduk}</td>
                      <td>${data.alamat_lengkap}</td>
                    </tr>`;
                    });

                    pengurusElemen += `</tbody>
                </table>
              </div>`;

                    var anggotaElemen = `
              <div class="headborder bordergrey flexcenter" style="margin-top:20px;"><h2 class="bordercolor-1">Daftar Anggota</h2></div>
              <div class="table-responsive content">
                <table class="w-full text-sm" id="tabel-data">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No. Anggota</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>`;

                    $('#kelompok-wrapper').html(detailElemen + pengurusElemen + anggotaElemen);

                    anggotaTable();
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    Swal.fire('Error', 'Terjadi kesalahan saat memuat data.', 'error');
                }
            });

            const anggotaTable = () => {
                $('#tabel-data').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ordering: true,
                    ajax: {
                        url: `{{ route('api.kelompok.anggota', ['slug' => $slug]) }}`,
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
                        error: function(xhr) {
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
                            orderable: false
                        },
                        {
                            data: 'no_anggota',
                            name: 'no_anggota',
                            render: (data, type, row) => row.attributes.no_anggota
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            className: 'text-wrap',
                            render: (data, type, row) => row.attributes.anggota.nama
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
                            render: (data, type, row) => row.attributes.alamat_lengkap
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin',
                            render: (data, type, row) => row.attributes.sex
                        },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        api.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = api.page.info().start + i + 1;
                        });
                    }
                });
            }
        });
    </script>
@endpush