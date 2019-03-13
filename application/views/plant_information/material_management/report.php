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
			
			<div class="col-md-12 nopadding scroll-block" style="padding: 10px 15px 12px 10px;">
				<div class="col-md-6 padding-left col-xs-12" style="padding: 0 20px 0 20px;">
	                <div class="col-xs-12 highlight nopadding" data-name="Relaisasi" rel="1" style="color: #fff;padding: 0; overflow: hidden; background-color: #008840;height: 250px">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header" style="color: #fff;padding: 12px">Realisasi Pembelian</h1>
	                    </div>
	                    <div class="col-xs-12 nopadding" align="left" style="font-size: 14px; margin-top: 12px">
	                    	<div class="col-xs-6 nopadding valproc" style="padding: 10px">Total Nilai PO (Ea)<br><b class="count valPO1" style="font-size: 40px">0</b></div>
	                    	<div class="col-xs-6 nopadding valproc" style="padding: 10px;">Total Nilai PO (mio)<br><b class="count valPO2" style="font-size: 40px">0</b></div>
	                    </div>
	                    <div class="col-xs-12 nopadding" align="left" style="font-size: 10px;">
	                    	<div class="col-xs-4 nopadding valproc" style="padding: 10px;border-left: hidden;">Total Nilai PO Bahan<br><b class="count valPODetail1">0</b></div>
	                    	<div class="col-xs-4 nopadding valproc" style="padding: 10px;border-left: hidden;">Total Nilai PO Jasa<br><b class="count valPODetail2">0</b></div>
	                    	<div class="col-xs-4 nopadding valproc" style="padding: 10px;border-left: hidden;">Total Nilai PO Barang<br><b class="count valPODetail3">0</b></div>
	                    </div>
	                    
	                </div>
				</div>
				<div class="col-md-3 padding-left col-xs-12" style="padding: 0 20px 0 20px;">
	                <div class="col-xs-12 highlight" data-name="PR-Rel" rel="2" style="padding: 0; overflow: hidden;height: 250px">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">Total PO (IDR)</h1>
	                    </div>
	                    
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px;">
	                    	<div class="chart" id="nilaiPO" style="min-height: 200px; width: 100%"></div>
	                	</div>
					</div>
				</div>
				<div class="col-md-3 padding-left col-xs-12" style="padding: 0 20px 0 20px;">
	                <div class="col-xs-12 highlight" data-name="PR-Rel" rel="2" style="padding: 0; overflow: hidden;height: 250px">
	                    <div class="inc" style="padding: 12px 10px 10px">
	                    	<h1 class="bottom_header">Grafik Pencapaian Investasi</h1>
	                    </div>
	                    
	                    <div class="col-xs-12 nopadding growth" align="left" style="font-size: 14px;">
	                    	<div class="chart" id="nilaiinvestasi" style="min-height: 200px; width: 100%"></div>
	                	</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 nopadding scroll-block" style="padding: 10px 15px 12px 10px;height: 300px">
				<div class="col-md-4 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend1" style="min-height: 500px; width: 100%"></div>
				</div>
				<div class="col-md-4 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend2" style="min-height: 500px; width: 100%"></div>
				</div>
				<div class="col-md-4 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend3" style="min-height: 500px; width: 100%"></div>
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
<script src="assets/js/procurement_monthly.js"></script>
