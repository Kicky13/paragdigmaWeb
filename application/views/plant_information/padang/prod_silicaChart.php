<style>
.noPadding{
		padding-top:1px;
		padding-left:1px;
		padding-right:1px;
		padding-bottom:1px;
}
.cubesRun{
	min-height:95px;
	width:100%;
	font-size:10px;
}
.PlantColor{
background: #C0C0C0;
}
</style>
<script>
	$(function (){
		$('#btn_prod_semen').click(function(){
			window.location.href = 'index.php/plant_padang/prod_semenChart';
		});
                $('#btn_prod_klin').click(function(){
			window.location.href = 'index.php/plant_padang/prod_klinker';
		});
		$('#btn_prod_lime').click(function(){
			window.location.href = 'index.php/plant_padang/prod_limeChart';
		});
		$('#btn_prod_rawmix').click(function(){
			window.location.href = 'index.php/plant_padang/prod_rawmix';
		});
		$('#btn_prod_silica').click(function(){
			window.location.href = 'index.php/plant_padang/prod_silicaChart';
		});
		$('#btn_prod_fineCoal').click(function(){
			window.location.href = 'index.php/plant_padang/prod_fineCoalChart';
		});
		$('#btnTable').click(function(){
			window.location.href = 'index.php/plant_padang/prod_silica';
		});
	});
</script>
<div class="row">
	<div class="col-xs-3">
		<h4>Chart Silica Production</h4>
	</div>
	<div class="col-xs-6">
		<div class="btn-group">
			<button class="btn btn-primary" aria-label="Left Align" id="btn_prod_lime" type="button">
				Lime Stone
			</button>
			<button class="btn btn-success" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
				Raw Mix
			</button>
			<button class="btn btn-info" aria-label="Left Align" id="btn_prod_klin" type="button">
				Clinker
			</button>
			<button class="btn btn-warning active" aria-label="Left Align" id="btn_prod_silica" type="button">
				Silica Stone
			</button>
			<button class="btn btn-danger" aria-label="Left Align"id="btn_prod_fineCoal"  type="button">
				Fine Coal
			</button>
			<button class="btn btn-default " aria-label="Left Align" id="btn_prod_semen" type="button">
				Cement 
			</button>
		</div>
	</div>
	<div class="col-xs-3">
		 <button type="button" class="btn btn-default" id="btnTable"><i class="fa fa-tasks" aria-hidden="true"></i></button>
	</div>
</div>
<!DOCTYPE HTML>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Realisasi Pencapaian Produksi Silica'
        },
        subtitle: {
            text: 'Source: Plant Information System'
        },
        xAxis: [{
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                 format: '{value:,.0f} Ton',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: 'RKAP',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Rainfall',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} Ton',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: 'REAL',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} Ton',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Rainfall',
            type: 'column',
            yAxis: 1,
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            tooltip: {
                valueSuffix: ' mm'
            },
			color:'#5cb85c'

        }, {
            name: 'REAL',
            type: 'spline',
            yAxis: 2,
            data: [
			<?php 
						echo $DProduction[1]['silicaReal'];
						for($i=2;$i <= date('n') ; $i++){
							echo ",".$DProduction[$i]['silicaReal'];
							}
					?>
			],
            marker: {
                enabled: true
            },
            dashStyle: 'ShortDash',
            tooltip: {
                valueSuffix: ' Ton'
            },
			color: '#f0ad4e'

        }, {
            name: 'RKAP',
            type: 'spline',
            data: [
					<?php 
						echo $DProduction[1]['silica'];
						for($i=2;$i <= 12 ; $i++){
							echo ",".$DProduction[$i]['silica'];
							}
					?>
			],
            tooltip: {
                valueSuffix: ' Ton'
            },
			color: '#337ab7'
        }]
    });
});


		</script>
	</head>
	<body>
<script src="Highcharts-4.2.4/js/highcharts.js"></script>
<script src="Highcharts-4.2.4/js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>