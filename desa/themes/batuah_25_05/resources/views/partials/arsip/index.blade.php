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
					<div class="center-head bggrad-color2 flexcenter">
						<div class="icon-titlepage bgcolor-1 flexcenter"><svg viewBox="0 0 24 24">
								<path d="M19,20H4C2.89,20 2,19.1 2,18V6C2,4.89 2.89,4 4,4H10L12,6H19A2,2 0 0,1 21,8H21L4,8V18L6.14,10H23.21L20.93,18.5C20.7,19.37 19.92,20 19,20Z" />
							</svg></div>
						<h1>Arsip</h1>
					</div>
					<div class="pagebox gridstyle artikelpage">
						<div class="box-body">
							<div class="table-responsive">
								<table id="arsip-artikel" class="table table-striped">
									<thead>
										<tr>
											<td width="3%"><b>No.</b></td>
											<td width="20%"><b>Tanggal Artikel</b></td>
											<td width="57"><b>Judul Artikel</b></td>
											<td width="10%"><b>Penulis</b></td>
											<td width="10%"><b>Dibaca</b></td>
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
    document.addEventListener("DOMContentLoaded", function(event) {
        var arsip = $('#arsip-artikel').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ordering: true,            
            ajax: {
                url: `{{ ci_route('internal_api.arsip') }}`,
                method: 'get',
                data: function(row) {                    
                    return {
                        "page[size]": row.length,
                        "page[number]": (row.start / row.length) + 1,
                        "filter[search]": row.search.value,  
                        "sort": (row.order[0]?.dir === "asc" ? "" : "-") + row.columns[row.order[0]?.column]
                            ?.name,                                                
                    };
                },
                dataSrc: function(json) {
                    json.recordsTotal = json.meta.pagination.total
                    json.recordsFiltered = json.meta.pagination.total

                    return json.data
                },
            },
            columnDefs: [{
                    targets: '_all',
                    className: 'text-nowrap',
                },                
            ],
            columns: [{
                    data: null,
                    orderable: false
                },                
                {
                    data: "attributes.tgl_upload_local",
                    name: "tgl_upload"
                },
                {
                    data: function(data) {
                        return `<a href="${data.attributes.url_slug}">
                                    ${data.attributes.judul}
                                </a>`
                    },
                    name: "judul",
                    orderable: false
                },
                {
                    data: "attributes.author.nama",
                    name: "id_user",
                    defaultContent: '',
                    searchable: false,
                    orderable: false
                },                
                {
                    data: "attributes.hit",
                    name: "hit",
                    searchable: false,
                },                
            ],
            order: [
                [1, 'desc']
            ]
        })

        arsip.on('draw.dt', function() {
            var PageInfo = $('#arsip-artikel').DataTable().page.info();
            arsip.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });
    });
	var config=@json(identitas());
</script>
@endpush
