<section id="content" class="income_statement">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#F8F8F8; padding-top: 6px;">

			<div class="col-md-12 nopadding" style="padding: 0 20px 0px 20px;">
				<div class="col-md-3 nopadding">
					<span class="tittle_head" id="tittle_head">Cost Of Revenue</span>
				</div>
				<div class="col-md-6 nopadding finddata" align="center">
					Company
						<select id="opco" class="opco highlight_option">
							<option value="7000">Semen Indonesia</option>
							<option value="3000">Semen Padang</option>
							<option value="5000">Semen Gresik</option>
							<option value="4000">Semen Tonasa</option>
							<option value="6000">Thang Long</option>
						</select>&nbsp;&nbsp;
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
					<input class="highlight_option total" rel="1" type="checkbox" data-toggle="toggle" data-on="Per Ton" data-onstyle="info" data-off="Total" data-offstyle="info" >&nbsp;&nbsp;
					<input class="highlight_option total" rel="3" type="checkbox" data-toggle="toggle" data-on="Year To Date" data-onstyle="info" data-off="Month To Date" data-offstyle="info" data-width="140" >
					
				</div>
			</div>
			<div class="col-md-12 nopadding" style="padding: 0 20px 12px 20px; margin-top: 12px;">

				<div class="col-md-6 nopadding col-xs-12">

					<div class="col-xs-12 nopadding" style="margin-top: 12px">
						<div class="col-md-10 nopadding col-xs-8">
							<span class="actual_title" style="font-size: 20px; font-weight: 600; color: #083d7c">Actual</span>
							<div>
								<span class="aktualisasi" style="line-height: 50px">0</span>			
							</div>
						</div>
						<div class="col-md-1 nopadding col-xs-2" align="center" style="padding-right: 10px;">
							<span style="font-size: 12px">MoM</span><br>
							<span class="MoM">0</span>
						</div>
						<div class="col-md-1 nopadding col-xs-2" align="center" style="padding-right: 10px">
							<span style="font-size: 12px">YoY</span><br>
							<span class="YoY">0</span>
						</div>
					</div>
					<div class="col-xs-12 nopadding" style="margin-top: 6px">
						<div class="chart" id="corchart" style="min-height: 250px; width: 100%"></div>
					</div>

					<div class="col-xs-12 nopadding scrollcostrev">
						<div class="col-md-4 bottom_clinker col-xs-12 blockcostrev">
			                <div class="col-xs-12 highlight nopadding bottom_block">
			                	<div class="col-xs-12 nopadding" style="margin-top: 3px; padding: 10px 10px 0 10px">
			                		<span class="bottom_header">Clinker Production</span><a onclick="changepage('plant_system/dashboard_klin')"><i class="fa fa-external-link" aria-hidden="true" style="float: right;line-height: 22px;color: #0db7fb"></i></a>
			                	</div>
			                	<div class="col-xs-12 nopadding" style="margin-top: 6px; padding-bottom: 5px">
			                		<div class="col-xs-7 nopadding" style="padding-left: 15px">
			                			<div class="col-xs-12 nopadding">
				                			<span style="font-size: 9px">Actual</span><br>
											<span class="bottom_actual" rel="1">0</span>
				                		</div>
			                			<div class="col-xs-12 nopadding" style="margin-top: 6px">
				                			<span style="font-size: 9px">RKAP</span><br>
											<span class="bottom_rkap" rel="1">0</span>
				                		</div>
			                		</div>
			                		<div class="col-xs-5 nopadding" align="center">
			                			<span class="side_persen" rel="1">0%</span>
			                		</div>
			                	</div>

			                	<div class="col-xs-12 nopadding" align="center" style="background: #008744;color: #ffffff; padding-bottom: 5px;color: #083d7c">
			                		<div class="col-xs-6 nopadding" style="padding: 5px 5px">
			                			<span style="font-size: 10px;color: #ffffff">MoM</span><br>
										<span class="bottom_mom" rel="1">0</span>
			                		</div>
			                		<div class="col-xs-6 nopadding" style="padding: 5px 5px">
			                			<span style="font-size: 10px;color: #ffffff">YoY</span><br>
										<span class="bottom_yoy" rel="1">0</span>
			                		</div>
			                	</div>
			                </div>
						</div>
						<div class="col-md-4 bottom_cement col-xs-12 blockcostrev">
			                <div class="col-xs-12 highlight nopadding bottom_block">
			                	<div class="col-xs-12 nopadding" style="margin-top: 3px; padding: 10px 10px 0 10px">
			                		<span class="bottom_header">Cement Production</span><a onclick="changepage('plant_system/dashboard_semen')"><i class="fa fa-external-link" aria-hidden="true" style="float: right;line-height: 22px;color: #0db7fb"></i></a>

			                	</div>
			                	<div class="col-xs-12 nopadding" style="margin-top: 6px; padding-bottom: 5px">
			                		<div class="col-xs-7 nopadding" style="padding-left: 15px">
			                			<div class="col-xs-12 nopadding" >
				                			<span style="font-size: 9px">Actual</span><br>
											<span class="bottom_actual" rel="2">0</span>
				                		</div>
				                		<div class="col-xs-12 nopadding" style="margin-top: 6px">
				                			<span style="font-size: 9px">RKAP</span><br>
											<span class="bottom_rkap" rel="2">0</span>
				                		</div>
			                		</div>
			                		<div class="col-xs-5 nopadding" align="center">
			                			<span class="side_persen" rel="2">0%</span>
			                		</div>
			                	</div>

			                	<div class="col-xs-12 nopadding" align="center" style="background: #008744;color: #ffffff; padding-bottom: 5px;color: #083d7c">
			                		<div class="col-xs-6 nopadding" style="padding: 5px 5px">
			                			<span style="font-size: 10px;color: #ffffff">MoM</span><br>
										<span class="bottom_mom" rel="2">0</span>
			                		</div>
			                		<div class="col-xs-6 nopadding" style="padding: 5px 5px">
			                			<span style="font-size: 10px;color: #ffffff">YoY</span><br>
										<span class="bottom_yoy" rel="2">0</span>
			                		</div>
			                	</div>
			                </div>
						</div>
						<div class="col-md-4 bottom_sales col-xs-12 blockcostrev" style="padding-right: 10px;">
			                <div class="col-xs-12 highlight nopadding bottom_block">
			                	<div class="col-xs-12 nopadding" style="margin-top: 3px; padding: 10px 10px 0 10px">
			                		<span class="bottom_header">Sales</span><a onclick="changepage('sales_dashboard/volume')"><i class="fa fa-external-link" aria-hidden="true" style="float: right;line-height: 22px;color: #0db7fb"></i></a>
			                	</div>
			                	<div class="col-xs-12 nopadding" style="margin-top: 6px; padding-bottom: 5px">
			                		<div class="col-xs-7 nopadding" style="padding-left: 15px">
			                			<div class="col-xs-12 nopadding">
				                			<span style="font-size: 9px">Actual</span><br>
											<span class="bottom_actual" rel="3">0</span>
				                		</div>
				                		<div class="col-xs-12 nopadding" style="margin-top: 6px">
				                			<span style="font-size: 9px">RKAP</span><br>
											<span class="bottom_rkap" rel="3">0</span>
				                		</div>
			                		</div>
			                		<div class="col-xs-5 nopadding" align="center">
			                			<span class="side_persen" rel="3">0%</span>
			                		</div>
			                	</div>

			                	<div class="col-xs-12 nopadding" align="center" style="background: #008744; padding-bottom: 5px;color: #083d7c">
			                		<div class="col-xs-6 nopadding" style="padding: 5px 5px">
			                			<span style="font-size: 10px;color: #ffffff">MoM</span><br>
										<span class="bottom_mom" rel="3">0</span>
			                		</div>
			                		<div class="col-xs-6 nopadding" style="padding: 5px 5px">
			                			<span style="font-size: 10px;color: #ffffff">YoY</span><br>
										<span class="bottom_yoy" rel="3">0</span>
			                		</div>
			                	</div>
			                </div>
						</div>
					</div>
				</div>

				<div class="col-md-6 nopadding col-xs-12">
					
					<div class="col-xs-12 nopadding" style="padding: 0 0 0 15px">
						<div class="highlight tablecostrev">
								<table class="table table-striped side_desc">
									<thead>
										<tr>
											<td rowspan="2" align="center" valign="center" width="150" style="border-right:1px solid #fff;line-height:50px">DESCRIPTION</td>
											<td class="side_month" width="300" colspan="3" align="center">Bulan ini</td>
											<td rowspan="2" align="center" valign="center" width="50" style="border-left:1px solid #fff;line-height:50px">%</td>
											<td rowspan="2" align="center" valign="center" width="50" style="border-left:1px solid #fff;line-height:50px">Trend</td>
										</tr>
										<tr>
											<td class="side_head1" width="100" align="center" style="border-right:1px solid #fff;">RKAP 2017</td>
											<td class="side_head2" width="100" align="center" style="border-right:1px solid #fff;">REAL 2017</td>
											<td class="side_head3" width="100" align="center">REAL 2016</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td width="150">Raw Material</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Material Support</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Fuel</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Electricity</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Labor</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Maintenance</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Depl. Deprec. &amp; Amortisasi</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>General &amp; Administration</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Taxes &amp; Insurance</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Packaging</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Distribution</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>Differences Stock</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
										<tr>
											<td>WIP (Purchase)</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td width="50">0%</td>
										</tr>
									</tbody>
								</table>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/#content -->
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:10%;width:80%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="dropdown">
		  <div class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  </div>
		  <div class="dropdown-menu selgl" aria-labelledby="dropdownMenuButton">
		  </div>
		</div>
      </div>
      <div class="modal-body">
      	<div class="table1">
	        <table class="table table-striped table-bordered detailCor1" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>NO</th>
		                <th>COSTCENTER</th>
		                <th>DESCRIPTION</th>
		                <th>GL ACCOUNT</th>
		                <th>DESCRIPTION</th> 
		                <th>Value</th>
		            </tr>
		        </thead>
		        <tbody>
		         </tbody>
		    </table>
      	</div>
      	<div class="table2">
	        <table class="table table-striped table-bordered detailCor2" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>NO</th>
		                <th>COSTCENTER</th>
		                <th>DESCRIPTION</th>
		                <th>GL ACCOUNT</th>
		                <th>DESCRIPTION</th> 
		                <th>Value</th>
		            </tr>
		        </thead>
		        <tbody>
		         </tbody>
		    </table>
	      </div>
      </div>
      <div class="modal-footer">
      	<div class="swicth-cs">
        	<button type="button" rel="1" class="btn btn-secondary active">Cost Center</button>
        	<button type="button" rel="2" class="btn btn-secondary">No Cost Center</button>
      	</div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailModalChart" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:10%;width:80%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="dropdown">
		  <div class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  </div>
		  <div class="dropdown-menu selgl" aria-labelledby="dropdownMenuButton2">
		  </div>
		</div>
      </div>
      <div class="modal-body">
			<div class="chart" id="corchartdetail" style="min-height: 250px; width: 100%"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
	.swicth-cs{
		float:left;
	}
	.swicth-cs button{
		background: #f1f1f1;
	}
	.swicth-cs button.active{
		background: #008744;
		color: #fff;
	}
	.dataTables_scrollBody thead{
		position: static;
	}
	.dropdown{
		cursor: pointer;
	}
	.selgl{
		width:200px;
		border-radius: 0;
	}
	.selgl a{
		display:block;
		padding:5px 14px;
		color:#083d7c;
	}
	#DataTables_Table_0_wrapper .row:first-child, #DataTables_Table_1_wrapper .row:first-child{
		position: absolute;
		top:-50px;
		right:20px;
	}
	#DataTables_Table_0_wrapper .row:first-child > div, #DataTables_Table_1_wrapper .row:first-child > div{
		width:100%;
	}
	.dropdown-toggle{
	    padding-left:0;
	    position: relative;
	}
	.open .dropdown-toggle:after{
	    content:"▲";
	}
	.dropdown-toggle:after{
	    content:"▼";
	    position: absolute;
	    right:-20px;
	    top:10px;
	    opacity: .5;
	}
	.dropdown-toggle a{
		font-size: 20px;
	    font-weight: 600;
	    color: #083d7c;
	    padding-left:0;
	}
	.side_desc i{
		font-size:12px;
		cursor: pointer;
	}
	.side_desc a{
		color: #464646;
	}
	.side_desc td{
		cursor: default;
	}
	.side_desc a:hover, .side_desc i:hover{
		color: #028740;
		font-weight: bold;
		cursor: pointer;
	}
	.modal-body .table2{
		height:0;
		overflow:hidden;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/bullet.js"></script>
<script src="assets/js/finance_cor.js"></script>

