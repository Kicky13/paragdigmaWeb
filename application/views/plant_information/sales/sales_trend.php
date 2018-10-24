<style>
	body{overflow:auto;padding-top:65px;}
	.burger-menu{position:fixed;}
	#header{position:fixed;top:0;z-index:9;}
	.cass_table{border-bottom:1px solid #000000;border-right:1px solid #000000;}
	.head_table{height:50px;border-top:1px solid #000000;border-left:1px solid #000000;}
	.head_table.no_border{border-top:0px solid #000000;border-left:1px solid #000000;}
	.head_table span{line-height: 45px;display: inline-block;}
	td.details-control {
		background: url('<?php echo base_url()?>/assets/images/details_open.png') no-repeat center center;
		cursor: pointer;
	}
	tr.shown td.details-control {
		background: url('<?php echo base_url()?>/assets/images/details_close.png') no-repeat center center;
	}
	#volume_plant{
		margin-bottom:100px !important;
		border:2px solid #f4f4f4;
	}
	.p_plant{color:#000;}
	#content_wrap{display:none;}
	#volume_plant th{
		border-right:2px solid #f4f4f4;
	}
	#volume_plant td{
		text-align:center;
	}
	#volume_plant td:nth-child(2){
		text-align:left;
	}
	.p_plant, .p_plant:focus{border-color:#000;}
	.p_plant, .p_plant option{background: transparent;color:#000;}
</style>
<section id="content">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#fff;padding-bottom:10px;">
			<div align="left" class="col-xs-12" style="margin-top:20px;">
				<div class="col-xs-6 nopadding" style="font-size:20px;font-weight:bold;">
					<i class="fa fa-bar-chart" aria-hidden="true" style="font-weight:normal;"></i>&nbsp;&nbsp;Daily Release
					<div style="position:fixed;top:14px;right:120px; z-index:10;">
						<select class="p_plant form-control" style="font-size:15px;font-weight:normal;">
							<option value="">All Plant</option>
						</select>
					</div>
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
		<div class="col-md-12" style="background:#fff;">
			<div class="col-md-12 nopadding" style="background:#fff;">
				<table id="volume_plant" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th rowspan="3"></th>
							<th rowspan="3">PLANT</th>
							<th colspan="4">HARI INI</th>
							<th colspan="6">KUMULATIF</th>
						</tr>
						<tr>
							<th colspan="2">TARGET</th>
							<th colspan="2">REAL</th>
							<th colspan="2">TARGET</th>
							<th colspan="2">REAL</th>
							<th colspan="2">VARIAN</th>
						</tr>
						<tr>
							<th>BAG</th>
							<th>CURAH</th>
							<th>BAG</th>
							<th>CURAH</th>
							<th>BAG</th>
							<th>CURAH</th>
							<th>BAG</th>
							<th>CURAH</th>
							<th>BAG</th>
							<th>CURAH</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<?php /*
		<div class="col-md-12 nopadding cass_table" style="background:#fff;text-align:center;">
			<!-- head -->
			<div class="col-md-12 nopadding cass_head_table">
				<div class="col-md-2 nopadding">
					<div class="col-md-12 nopadding head_table">
					</div>
					<div class="col-md-12 nopadding head_table no_border">
						<span>Plant</span>
					</div>
					<div class="col-md-12 nopadding head_table no_border">
					</div>
					<div class="col-md-12 nopadding head_table no_border">
					</div>
				</div>
				<div class="col-md-5 nopadding">
					<div class="col-md-12 nopadding head_table">
						<span>Hari Ini</span>
					</div>
					<div class="col-md-12 nopadding">
						<div class="col-md-6 nopadding">
							<div class="col-md-12 nopadding head_table">
								<span>Target</span>
							</div>
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 nopadding">
							<div class="col-md-12 nopadding head_table">
								<span>Real</span>
							</div>
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 nopadding">
					<div class="col-md-12 nopadding head_table">
						<span>Kumulatif</span>
					</div>
					<div class="col-md-12 nopadding">
						<div class="col-md-4 nopadding">
							<div class="col-md-12 nopadding head_table">
								<span>Target</span>
							</div>
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 nopadding">
							<div class="col-md-12 nopadding head_table">
								<span>Real</span>
							</div>
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 nopadding">
							<div class="col-md-12 nopadding head_table">
								<span>Varian</span>
							</div>
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end head -->
			<!-- body -->
			<div class="col-md-12 nopadding cass_body_table">
				<div class="col-md-2 nopadding">
					<div class="col-md-12 nopadding head_table no_border">
						<span>Plant</span>
					</div>
				</div>
				<div class="col-md-5 nopadding">
					<div class="col-md-12 nopadding">
						<div class="col-md-6 nopadding">
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 nopadding">
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 nopadding">
					<div class="col-md-12 nopadding">
						<div class="col-md-4 nopadding">
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 nopadding">
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 nopadding">
							<div class="col-md-12 nopadding">
								<div class="col-md-6 nopadding head_table">
									<span>Bag</span>
								</div>
								<div class="col-md-6 nopadding head_table">
									<span>Curah</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end body -->
		</div>*/?>
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