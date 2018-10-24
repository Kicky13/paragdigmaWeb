<section id="content">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#fff;padding-bottom:10px;">
			<div align="left" class="col-xs-12" style="margin-top:20px;">
				<div class="col-xs-6 nopadding" style="font-size:20px;font-weight:bold;">
					<i class="fa fa-bar-chart" aria-hidden="true" style="font-weight:normal;"></i>&nbsp;&nbsp;Daily Release
				</div>
				<div class="col-xs-6" align="right" style="font-weight:bold;">
					<font color="#2eb149">Akumulasi RKAP : <span class="daily-rkap"></span></font>
					&nbsp;&nbsp;
					<font color="#af20c1">Prognose : <span class="daily-prognose"></span></font>
					&nbsp;&nbsp;
					<font color="#D91E18">Varian : <span class="daily-selisih"></span></font>
				</div>
			</div>
			<div id="dailyTrend" class="chart"></div>
			<div align="left" class="col-xs-12" style="margin-top:20px;">
				<div class="col-xs-6 nopadding" style="font-size:20px;font-weight:bold;">
					<i class="fa fa-bar-chart" aria-hidden="true" style="font-weight:normal;"></i>&nbsp;&nbsp;Monthly Release
				</div>
				<div class="col-xs-6" align="right" style="font-weight:bold;">
					<font color="#2eb149">Akumulasi RKAP : <span class="monthly-rkap"></span></font>
					&nbsp;&nbsp;
					<font color="#af20c1">Prognose : <span class="monthly-prognose"></span></font>
					&nbsp;&nbsp;
					<font color="#D91E18">Varian : <span class="monthly-selisih"></span></font>
				</div>
			</div>
			<div id="monthlyTrend" class="chart"></div>
		</div>
	</div>
</section><!--/#content -->
<script type="text/javascript">
	var jenis = "<?php echo $jenis ?>";
	var opco = "<?php echo $opco ?>";
</script>
<style>
	.highcharts-legend-item tspan{font-size:16px;font-weight:normal;}
	.highcharts-tooltip .total-legend{display:none;}
</style>
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="assets/js/sales_trend.js"></script>