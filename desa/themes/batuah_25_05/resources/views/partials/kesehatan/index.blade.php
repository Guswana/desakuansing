@extends('theme::layouts.full-content')
@include('theme::commons.asset_highcharts')

@push('styles')
<style type="text/css">
.kesehatan .row{margin-right:-5px;margin-left:-5px;}
.kesehatan .col-lg-4, .kesehatan .col-sm-6, .kesehatan .col-xs-12{padding:5px;}
</style>
@endpush
@section('content')
@include('theme::plus.header_side')
<div class="mainpage">
	<div class="margin-side-10">
	<div class="stunting"> 
	<div class="mainbodyarea">
		<div class="bigarea hiddenrelative">
		<div class="bigarea-margin">
			<div class="col-default margin-top-10">
				<div class="bodypage bgwhite bordergrey kesehatan">
					<div class="center-head bggrad-color2 flexcenter">
						<div class="icon-titlepage bgcolor-1 flexcenter"><svg viewBox="0 0 24 24"><path d="M7.5,2A2,2 0 0,1 9.5,4A2,2 0 0,1 7.5,6A2,2 0 0,1 5.5,4A2,2 0 0,1 7.5,2M6,22V16H3L5.6,8.4C5.9,7.6 6.6,7 7.5,7C8.4,7 9.2,7.6 9.4,8.4L12,16H9V22H6M14.5,12A2,2 0 0,1 16.5,10A2,2 0 0,1 18.5,12A2,2 0 0,1 16.5,14A2,2 0 0,1 14.5,12M15,15H18L19.5,19H18V22H15V19H13.5L15,15Z" /></svg></div>
						<h1>Stunting</h1>
					</div>
					 <form class="form form-inline" action="" method="get" style="margin:15px 5px 0;">   
					 <div class="row" style="margin:0;">
						<div class="col-lg-5 col-sm-12" style="padding:0 5px;margin:3px 0;">
							<select name="kuartal" id="kuartal" required class="form-control input-sm" title="Pilih salah satu" style="width:100%;">
								@foreach (kuartal2() as $item)
								<option value="{{ $item['ke'] }}" @selected($item['ke'] == $kuartal)>
									Kuartal ke {{ $item['ke'] }}
									({{ $item['bulan'] }})
								</option>
								@endforeach
							</select>
						
						</div>
						<div class="col-lg-7 col-sm-12" style="padding:0 5px;">
						<div class="row" style="margin:0 -5px;">
							<div class="col-lg-4 col-sm-12" style="padding:0 5px;margin:3px 0;">
							<select name="tahun" id="tahun" class="form-control input-sm" title="Pilih salah satu" style="width:100%;">
								@foreach ($dataTahun as $item)
								<option value="{{ $item->tahun }}" @selected($tahun == $item->tahun)>{{ $item->tahun }}</option>
								@endforeach
							</select>
							</div>
							<div class="col-lg-4 col-sm-12" style="padding:0 5px;margin:3px 0;">
							<select name="id_posyandu" id="id_posyandu" class="form-control input-sm" title="Pilih salah satu" style="width:100%;">
								<option value="">Semua</option>
								@foreach ($posyandu as $item)
								<option value="{{ $item->id }}" @selected($item->id == $idPosyandu)>
									{{ $item->nama }}</option>
								@endforeach
							</select>
							</div>
							<div class="col-lg-4 col-sm-12" style="padding:0 5px;margin:3px 0;">
							<button type="submit" class="btn btn-info btn-sm flexcenter" id="cari" style="width:100%;">
								<i class="fa fa-search" style="margin:0 5px 0 0;"></i> Cari
							</button>
							</div>
						</div>	
						</div>
					</div>	
					</form>
					<div class="box-body" id="stunting-list" style="margin:10px 10px;">
    
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
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            const tahun = document.getElementById('tahun').value
            const kuartal = document.getElementById('kuartal').value
            const idPosyandu = document.getElementById('id_posyandu').value
            const widgetTemplate = `@include('theme::partials.kesehatan.widget_item')`
            const templateStunting = document.createElement('template')
            templateStunting.innerHTML = `@include('theme::partials.kesehatan.chart_stunting_umur')`
            const stuntingUmurNode = templateStunting.content.firstElementChild
            const templatePosyandu = document.createElement('template')
            templatePosyandu.innerHTML = `@include('theme::partials.kesehatan.chart_stunting_posyandu')`
            const posyanduNode = templatePosyandu.content.firstElementChild
            const scorecardNode = document.createElement('div')
            const listIcon = ['fa-female', 'fa-child', 'fa-female', 'fa-child', 'fa-child', 'fa-child', 'fa-child']
            const loadStunting = function(tahun, kuartal, idPosyandu) {
                const stuntingList = document.getElementById('stunting-list');
                $.ajax({
                    url: `{{ ci_route('internal_api.stunting') }}`,
                    data: {
                        'tahun': tahun,
                        'kuartal': kuartal,
                        'idPosyandu': idPosyandu
                    },
                    type: "GET",
                    beforeSend: function() {
                        stuntingList.innerHTML = `@include('theme::commons.loading')`
                    },
                    dataType: 'json',
                    data: {

                    },
                    success: function(data) {
                        stuntingList.innerHTML = ''
                        const widgets = data.data[0]['attributes']['widgets']
                        const chartStuntingUmurData = data.data[0]['attributes']['chartStuntingUmurData']
                        const chartStuntingPosyanduData = data.data[0]['attributes']['chartStuntingPosyanduData']
                        const scorecard = data.data[0]['attributes']['scorecard']
                        const widgetList = document.createElement('div')
                        widgetList.className = `row`
                        stuntingList.appendChild(widgetList)
                        stuntingList.appendChild(stuntingUmurNode)
                        stuntingList.appendChild(posyanduNode)
                        stuntingList.appendChild(scorecardNode)
                        widgets.forEach(element => {
                            widgetList.innerHTML +=
                                widgetTemplate.replace('@@bg-color', (element['bg-color'] == 'bg-gray' ? 'bg-danger' : element['bg-color']))
                                .replace('@@icon', listIcon[element.icon] ?? 'fa-female')
                                .replace('@@title', element.title)
                                .replace('@@total', element.total)

                        });

                        generateChart(chartStuntingUmurData)
                        generatePosyandu(chartStuntingPosyanduData)
                        generateScorecard(scorecard)
                    }
                });
            }

            const generateChart = function(chartStuntingUmurData) {
                chartStuntingUmurData.forEach(function(item) {
                    Highcharts.chart(item['id'], {
                        chart: {
                            type: 'pie'
                        },
                        title: {
                            text: item['title']
                        },
                        tooltip: {
                            valueSuffix: '%'
                        },
                        plotOptions: {
                            series: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                colors: ['blue', 'red'],
                                showInLegend: true,
                            },
                            pie: {
                                dataLabels: {
                                    enabled: true,
                                    distance: -50,
                                    format: '{point.y:,.1f} %'
                                }
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'percentage',
                            colorByPoint: true,
                            data: item['data']
                        }]

                    })
                })
            }

            const generatePosyandu = function(chartStuntingPosyanduData) {
                Highcharts.chart('chart_posyandu', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Kasus Stunting per-Posyandu'
                    },
                    xAxis: {
                        categories: chartStuntingPosyanduData['categories']
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Angka Kasus Stunting'
                        }
                    },
                    colors: ['#028EFA', '#5EE497', '#FDB13B'],
                    series: chartStuntingPosyanduData['data']

                })
            }
            const generateScorecard = function(scorecard) {
                const _url = `{{ ci_route('data-kesehatan.scorecard') }}`
                $.post(_url, {
                    scorecard: scorecard
                }, (html) => scorecardNode.innerHTML = html)
            }
            loadStunting(tahun, kuartal, idPosyandu)
        });
		var config=@json(identitas());
    </script>
@endpush
