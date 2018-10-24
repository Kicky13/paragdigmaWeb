<section id="content">	
	<div class="centering add_fix">
		<div class="col-md-9 nopadding" style="background:#fff;padding-bottom:10px;">
			<div class="col-md-12 nopadding persen-group" style="padding-right:15px;">
				<div class="col-md-4 padding-left persen-today">
	                <div class="col-xs-12 highlight">
	                    <div class="col-xs-12 nopadding">
	                        To day
	                    </div>
	                    <div class="percent" align="center">
	                        <span><font color="red">0</font><i class="fa fa-sort-desc" aria-hidden="true" style="color: red;"></i></span>
	                    </div>
	                    <div class="col-xs-4 target-today" align="center">
	                        <span>Target</span><br>
	                        <span class="number">0</span>
	                    </div>
	                    <div class="col-xs-4 noPadding actual-today" align="center">
	                        <span>Actual</span><br>
	                        <span class="number">0</span>
	                    </div>
	                    <div class="col-xs-4 noPadding variant-today" align="center">
	                        <span>Varian</span><br>
	                        <span class="number">0</span>
	                    </div>
		                <div class="col-xs-12 nopadding">
			                <div id="dailyChart" class="chart"></div>
						</div>
	                </div>
				</div>
				<div class="col-md-4 padding-left persen-monthtoday">
	                <div class="col-xs-12 highlight">
	                    <div class="col-xs-12 nopadding">
	                        Month to day
	                    </div>
	                    <div class="percent" align="center">
	                        <span><font color="red">0</font><i class="fa fa-sort-desc" aria-hidden="true" style="color: red;"></i></span>
	                    </div>
	                    <div class="col-xs-4 target-monthtoday" align="center">
	                        <span>Target</span><br>
	                        <span class="number">0</span>
	                    </div>
	                    <div class="col-xs-4 noPadding actual-monthtoday" align="center">
	                        <span>Actual</span><br>
	                        <span class="number">0</span>
	                    </div>
	                    <div class="col-xs-4 noPadding variant-monthtoday" align="center">
	                        <span>Varian</span><br>
	                        <span class="number">0</span>
	                    </div>
		                <div class="col-xs-12 nopadding">
			                <div id="monthUpToChart" class="chart"></div>
						</div>
	                </div>
				</div>
				<div class="col-md-4 padding-left persen-yeartoday">
	                <div class="col-xs-12 highlight">
	                    <div class="col-xs-12 nopadding">
	                        Year to day
	                    </div>
	                    <div class="percent" align="center">
	                        <span><font color="red">0</font><i class="fa fa-sort-desc" aria-hidden="true" style="color: red;"></i></span>
	                    </div>
	                    <div class="col-xs-4 target-yeartoday" align="center">
	                        <span>Target</span><br>
	                        <span class="number">0</span>
	                    </div>
	                    <div class="col-xs-4 noPadding actual-yeartoday" align="center">
	                        <span>Actual</span><br>
	                        <span class="number">0</span>
	                    </div>
	                    <div class="col-xs-4 noPadding variant-yeartoday" align="center">
	                        <span>Varian</span><br>
	                        <span class="number">0</span>
	                    </div>
		                <div class="col-xs-12 nopadding">
			                <div id="yearUpToChart" class="chart"></div>
						</div>
	                </div>
				</div>
			</div>
			<div class="col-md-12 nopadding">
				<div class="col-md-6" style="padding-right:7.5px;">
					<div class="col-md-12 cover_table">
						<h1 style="margin:10px 0 10px 0;">Volume (Month to day)</h1>
		                <table class="table table-striped table-volume">
		                    <thead>
			                    <tr>
			                        <td><strong>Propinsi</strong></td>
			                        <td align="center" valign="middle"><strong>Target</strong></td>
			                        <td align="center" valign="middle"><strong>Actual</strong></td>
			                        <td align="center" valign="middle"><strong>%</strong></td>
			                    </tr>
		                    </thead>
		                    <tbody>
			                    
		                    </tbody>
		                </table>
					</div>
				</div>
				<div class="col-md-6" style="padding-left:7.5px;">
					<div class="col-md-12 cover_table">
						<h1 style="margin:10px 0 10px 0;">Market Share (Month to day)</h1>
		                <table class="table table-striped table-market">
		                    <thead>
			                    <tr>
			                        <td><strong>Propinsi</strong></td>
			                        <td align="center" valign="middle"><strong>Target</strong></td>
			                        <td align="center" valign="middle"><strong>Actual</strong></td>
			                        <td align="center" valign="middle"><strong>%</strong></td>
			                    </tr>
		                    </thead>
		                    <tbody>
							
		                    </tbody>
		                </table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 nopadding persen-wilayah" style="background-color:#f7f7f7">
			
		</div>
	</div>
</section><!--/#content -->
<script type="text/javascript" src="js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
	var opco = "<?php echo $opco?>";
</script>
<script src="assets/js/sales_revenue_detail.js"></script>