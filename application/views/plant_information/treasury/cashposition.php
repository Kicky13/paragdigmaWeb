<section id="content" class="income_statement">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#F8F8F8;padding-top: 6px">
			
			<div class="col-md-12 nopadding col-xs-12" style="padding: 0 20px 10px 20px;">
				<div class="col-md-2 nopadding col-xs-12">
					<!-- <span class="tittle_head" id="tittle_head">PR</span> -->
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
							<option class="cement" value="all">All</option>
							<option class="cement" value="1000">SMIG</option>
							<option class="cement" value="7000">Semen Indonesia</option>
							<option class="cement" value="3000">Semen Padang</option>
							<option class="cement" value="5000">Semen Gresik</option>
							<option class="cement" value="4000">Semen Tonasa</option>
							<option class="cement" value="6000">Thang Long</option>
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
					
				</div>
			</div>
			
			<div class="col-md-12 nopadding col-xs-12" style="margin-top: 12px; padding: 0 20px 12px 20px;">
				<div class="col-md-3 nopadding col-xs-6">
					<span class="actual_title" style="font-size: 20px; font-weight: 600; color: #083d7c">Cash on Hands</span>
					<div>
						<span class="aktualisasi" id="cashonhand" style="line-height: 55px">0</span>
					</div>
				</div>
				<div class="col-md-6 nopadding col-xs-6">
					<div class="col-xs-4 nopadding" align="center" style="padding-right: 8px;">
						<span  class="growthheader" style="font-size: 14px;">Begining Balance</span><br>
						<span class="valMoM" id="cash"> 0</span>
					</div>
					<div class="col-xs-4 nopadding" align="center">
						<span class="growthheader" style="font-size: 14px">Receipt</span><br>
						<span class="valYoY" id="cashin"> 0</span>
					</div>
					<div class="col-xs-4 nopadding" align="center">
						<span class="growthheader" style="font-size: 14px">Disburstement</span><br>
						<span class="valYoY" id="cashout"> 0</span>
					</div>
				</div>
			</div>			
			<div class="nopadding col-xs-12" style="padding: 0 20px 20px 20px;height: 200px">
				<div class="chart" id="trend1" style="min-height: 150px; width: 100%"></div>
			</div>
			<div class="nopadding col-xs-12" style="padding: 20px 20px 20px 20px;height: 200px">
				<div class="chart" id="trend2" style="min-height: 150px; width: 100%"></div>
			</div>
			<div class="nopadding col-xs-12" style="padding: 40px 20px 20px 20px;height: 200px">
				<div class="chart" id="trend3" style="min-height: 150px; width: 100%"></div>
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
<script src="assets/js/cashposition.js"></script>
