<section id="content" class="income_statement">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#F8F8F8;padding-top: 6px">
			
			<div class="col-md-12 nopadding col-xs-12" style="padding: 0 20px 10px 20px;">
				<div class="col-md-2 nopadding col-xs-12">
					<span class="tittle_head" id="tittle_head">Revenue</span>
				</div>
				<div class="col-md-7 nopadding col-xs-12 finddata" align="center">
					<!-- Type
						<select id="opco" class="opco highlight_option chooseType">
							<option value="1" selected>Cement</option>
							<option value="2">Non Cement</option>
						</select>
						&nbsp;&nbsp; -->
					Company
						<select id="opco" class="opco highlight_option">
							<option class="cement" value="1000">SMIG</option>
							<option class="cement" value="7000">Semen Indonesia</option>
							<option class="cement" value="3000">Semen Padang</option>
							<option class="cement" value="5000">Semen Gresik</option>
							<option class="cement" value="4000">Semen Tonasa</option>
							<option class="cement" value="6000">Thang Long</option>
							<option class="cement" value="8000">PT Semen Indonesia Aceh</option>
							<option class="cement" value="9000">PT Semen Kupang Indonesia</option>
							<option class="noncement" value="2100">PT Kawasan Industri Gresik</option>
							<option class="noncement" value="2200">PT United Tractor Semen Gresik</option>
							<option class="noncement" value="2300">PT Industri Kemasan Semen Gresik</option>
							<option class="noncement" value="2710">PT Swadaya Graha</option>
							<option class="noncement" value="2720">PT Semen Indonesia Logistic</option>
							<option class="noncement" value="2730">PT Eternit Gresik</option>
							<option class="noncement" value="2740">Koperasi Warga Semen Gresik</option>
							<option class="noncement" value="3100">PT Bima Sepaja Abadi</option>
							<option class="noncement" value="3200">PT Sepatim Batamtama</option>
							<option class="noncement" value="3710">PT IGASAR</option>
							<option class="noncement" value="3720">PT Sumatera Utara Perkasa Semen</option>
							<option class="noncement" value="G100">PT SGG Energi Prima</option>
							<option class="noncement" value="G200">PT Semen Indonesia Beton</option>
							<option class="noncement" value="G300">PT Sinergi Informatika Semen Indonesia</option>
							<option class="noncement" value="G400">PT Krakatau Semen Indonesia</option>
							<option class="noncement" value="G500">PT Semen Indonesia International</option>
						</select>
						&nbsp;&nbsp;
					Month
						<select id="month" class="month highlight_option">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>&nbsp;&nbsp;
					Year
						<select id="year" class="year highlight_option">
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
						</select>&nbsp;&nbsp;&nbsp;
					<a class="highlight_option find" style="display: inline-block; margin-top: 8px; width: 60px;">
						<span>Find</span>
					</a>
				</div>
				<div class="col-md-3 nopadding col-xs-12 choosedata" align="right" style="padding-top: 10px">
					<!-- <div class="col-xs-6 nopadding" align="center">
						<a class="highlight_option total active" rel="1" style="display: inline-block; margin-top: 8px; width: 80px;">
							<span>Total</span>
						</a>
						<a class="highlight_option total" rel="2" style="display: inline-block; margin-top: 8px; width: 80px;">
							<span>Per Ton</span>
						</a>
					</div>
					<div class="col-xs-6 nopadding" align="center">
						<a class="highlight_option total" rel="3" style="display: inline-block; margin-top: 8px; width: 80px;">
							<span>Month</span>
						</a>
						<a class="highlight_option total" rel="4" style="display: inline-block; margin-top: 8px; width: 80px;">
							<span>Year</span>
						</a>
					</div> -->
					
					<input class="highlight_option total" rel="1" type="checkbox" data-toggle="toggle" data-on="Per Ton" data-onstyle="info" data-off="Total" data-offstyle="info">&nbsp;&nbsp;
					<input class="highlight_option total" rel="3" type="checkbox" data-toggle="toggle" data-on="Year To Date" data-onstyle="info" data-off="Month To Date" data-offstyle="info" data-width="140" >
				</div>
			</div>
			<!-- <div class="col-xs-12 nopadding chartsmig">
					<div class="chart" id="incomesmig" style="min-height: 250px; width: 100%"></div>
			</div> -->

			<div class="col-md-12 nopadding col-xs-12" style="margin-top: 12px; padding: 0 20px 12px 20px;">
				<div class="col-md-9 nopadding col-xs-6">
					<span class="actual_title" style="font-size: 20px; font-weight: 600; color: #083d7c">Actual</span>
					<div>
						<span class="aktualisasi" style="line-height: 55px">0</span>
					</div>
				</div>
				<div class="col-md-3 nopadding col-xs-6">
					<div class="col-xs-6 nopadding" align="center" style="padding-right: 8px;">
						<span  class="growthheader" style="font-size: 14px;">Growth MoM</span><br>
						<span class="valMoM"> 0</span>&nbsp;<b>(</b><span class="MoM">0</span><b>)</b>
					</div>
					<div class="col-xs-6 nopadding" align="center">
						<span class="growthheader" style="font-size: 14px">Growth YoY</span><br>
						<span class="valYoY"> 0</span>&nbsp;<b>(</b><span class="YoY">0</span><b>)</b>
					</div>
				</div>
			</div>

			<div class="col-md-12 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
				<div class="chart" id="income11" style="min-height: 250px; width: 100%">
				</div>
			</div>

			<div class="col-md-12 nopadding col-5 scroll-block" style="padding: 10px 15px 12px 10px;">
				<div class="col-md-2 padding-left col-xs-12">
	                <div class="col-xs-12 highlight block active nopadding" data-name="Revenue" rel="1" style="padding: 0; overflow: hidden;">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">Revenue<a href="sales_dashboard/revenue" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></h1>
	                    	
	                    </div>
	                    <div class="col-xs-12 valrkap" align="right">
	                    	<span class="persen1 bottom_persen">0%</span>
	                    </div>
	                    <div class="chart" id="income1" style="height: 100px"></div>
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px; margin-top: 6px">
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px">Actual<br><b class="actual1">0</b></div>
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px;">RKAP<br><b class="rkap1">0</b></div>
	                    </div>
	                    
	                </div>
				</div>
				<div class="col-md-2 padding-left col-xs-12">
	                <div class="col-xs-12 highlight block" data-name="Cost Of Revenue" rel="2" style="padding: 0; overflow: hidden;">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">Cost Of Revenue<a href="finance_dashboard/income_statement" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></h1>
	                    </div>
	                    <div class="col-xs-12 valrkap" align="right">
	                    	<span class="persen2 bottom_persen">0%</span>
	                    </div>
	                    <div class="chart" id="income2" style="height: 100px"></div>
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px; margin-top: 6px">
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px">Actual<br><b class="actual2">0</b></div>
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px;">RKAP<br><b class="rkap2">0</b></div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2 padding-left col-xs-12">
	                <div class="col-xs-12 highlight block" data-name="Operation Expense" rel="3" style="padding: 0; overflow: hidden;">
	                   <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">Operation Expense<a href="finance_dashboard/operation_expense" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></h1>
	                    </div>
	                    <div class="col-xs-12 valrkap" align="right">
	                    	<span class="persen3 bottom_persen">0%</span>
	                    </div>
	                    <div class="chart" id="income3" style="height: 100px"></div>
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px; margin-top: 6px">
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px">Actual<br><b class="actual3">0</b></div>
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px;">RKAP<br><b class="rkap3">0</b></div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2 padding-left col-xs-12">
	                <div class="col-xs-12 highlight block" data-name="EBITDA" rel="4" style="padding: 0; overflow: hidden;">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">EBITDA</h1>
	                    </div>
	                    <div class="col-xs-12 valrkap" align="right">
	                    	<span class="persen4 bottom_persen">0%</span>
	                    </div>
	                    <div class="chart" id="income4" style="height: 100px"></div>
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px">
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px">Actual<br><b class="actual4">0</b></div>
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px">RKAP<br><b class="rkap4">0</b></div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2 padding-left col-xs-12">
	                <div class="col-xs-12 highlight block" data-name="Net Profit" rel="5" style="padding: 0; overflow: hidden;">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">Net Profit</h1>
	                    </div>
	                    <div class="col-xs-12 valrkap" align="right">
	                    	<span class="persen5 bottom_persen">0%</span>
	                    </div>
	                    <div class="chart" id="income5" style="height: 100px"></div>
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px">
	                    	<div class="col-xs-6 nopadding valrkap" align="center" style="padding: 10px">Actual<br><b class="actual5">0</b></div>
	                    	<div class="col-xs-6 nopadding valrkap"  align="center"  style="padding: 10px">RKAP<br><b class="rkap5">0</b></div>
	                    	
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>

</section><!--/#content -->
<style type="text/css">
	.inc div b{font-size:20px;}
</style>
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/bullet.js"></script>
<script src="assets/js/finance_dashboard.js"></script>
</script>