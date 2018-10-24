<section id="content" class="finance">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#fff;margin-top:10px;">
			<div class="col-xs-12 nopadding" style="padding-right:15px;">
				<div class="col-xs-12 nopadding" style="margin:0;padding-left:15px">
					<div class="col-xs-12 nopadding">
						<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">Penjualan Toko Per Area</font>
							<div style="float: right;margin-left:10px;">
								Tahun:
								<select class="p_thn_saletokoarea">
									<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
									<option value="<?php echo $a?>"><?php echo $a?></option>
									<?php }?>
								</select>
							</div>
							<div style="float: right;">
								Bulan:
								<select class="p_bln_saletokoarea">
									<option value="01" <?php echo (date('m')=="01")? "selected/" : "";?> >January</option>
									<option value="02" <?php echo (date('m')=="02")? "selected/" : "";?> >February</option>
									<option value="03" <?php echo (date('m')=="03")? "selected/" : "";?> >March</option>
									<option value="04" <?php echo (date('m')=="04")? "selected/" : "";?> >April</option>
									<option value="05" <?php echo (date('m')=="05")? "selected/" : "";?> >May</option>
									<option value="06" <?php echo (date('m')=="06")? "selected/" : "";?> >June</option>
									<option value="07" <?php echo (date('m')=="07")? "selected/" : "";?> >July</option>
									<option value="08" <?php echo (date('m')=="08")? "selected/" : "";?> >August</option>
									<option value="09" <?php echo (date('m')=="09")? "selected/" : "";?> >September</option>
									<option value="10" <?php echo (date('m')=="10")? "selected/" : "";?> >October</option>
									<option value="11" <?php echo (date('m')=="11")? "selected/" : "";?> >November</option>
									<option value="12" <?php echo (date('m')=="12")? "selected/" : "";?> >December</option>
								</select>
							</div>
						</div>
						<div id="salesArea" class="chart highlight" style="height:39vh;">
							<div class="loader" style="margin-top:5%;"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-12" style="margin:0;padding-right:0">
					<div class="col-xs-12 nopadding">
						<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">Penjualan Toko Per Distributor</font>
							<div style="float: right;margin-left:10px;">
								Tahun:
								<select class="p_thn_saletokodist">
									<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
									<option value="<?php echo $a?>"><?php echo $a?></option>
									<?php }?>
								</select>
							</div>
							<div style="float: right;">
								Bulan:
								<select class="p_bln_saletokodist">
									<option value="01" <?php echo (date('m')=="01")? "selected/" : "";?> >January</option>
									<option value="02" <?php echo (date('m')=="02")? "selected/" : "";?> >February</option>
									<option value="03" <?php echo (date('m')=="03")? "selected/" : "";?> >March</option>
									<option value="04" <?php echo (date('m')=="04")? "selected/" : "";?> >April</option>
									<option value="05" <?php echo (date('m')=="05")? "selected/" : "";?> >May</option>
									<option value="06" <?php echo (date('m')=="06")? "selected/" : "";?> >June</option>
									<option value="07" <?php echo (date('m')=="07")? "selected/" : "";?> >July</option>
									<option value="08" <?php echo (date('m')=="08")? "selected/" : "";?> >August</option>
									<option value="09" <?php echo (date('m')=="09")? "selected/" : "";?> >September</option>
									<option value="10" <?php echo (date('m')=="10")? "selected/" : "";?> >October</option>
									<option value="11" <?php echo (date('m')=="11")? "selected/" : "";?> >November</option>
									<option value="12" <?php echo (date('m')=="12")? "selected/" : "";?> >December</option>
								</select>
							</div>
						</div>
						<div id="salesDistributor" class="chart highlight" style="height:39vh;"><div class="loader" style="margin-top:5%;"></div></div>
					</div> 
				</div>
				<div class="col-xs-6" style="margin:0;padding-right:0">
					<div class="col-xs-12 nopadding">
						<div class="highlight">
							<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
								<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">Top 10 Penjualan Toko per Area</font>
								<div style="float: right;margin-left:10px;">
									Pilih Area:
									<select class="p_topten">
										<option value="1">Area 1</option>
										<option value="2">Area 2</option>
										<option value="3">Area 3</option>
										<option value="4">Area 4</option>
										<option value="5">Area 5</option>
										<option value="6">Area 6</option>
										<option value="7">Area 7</option>
										<option value="8">Area 8</option>
									</select>
								</div>
								<div style="float: right;margin-left:10px;">
									Tahun:
									<select class="p_thn_toptokoarea">
										<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
										<option value="<?php echo $a?>"><?php echo $a?></option>
										<?php }?>
									</select>
								</div>
								<div style="float: right;">
									Bulan:
									<select class="p_bln_toptokoarea">
										<option value="01" <?php echo (date('m')=="01")? "selected/" : "";?> >January</option>
										<option value="02" <?php echo (date('m')=="02")? "selected/" : "";?> >February</option>
										<option value="03" <?php echo (date('m')=="03")? "selected/" : "";?> >March</option>
										<option value="04" <?php echo (date('m')=="04")? "selected/" : "";?> >April</option>
										<option value="05" <?php echo (date('m')=="05")? "selected/" : "";?> >May</option>
										<option value="06" <?php echo (date('m')=="06")? "selected/" : "";?> >June</option>
										<option value="07" <?php echo (date('m')=="07")? "selected/" : "";?> >July</option>
										<option value="08" <?php echo (date('m')=="08")? "selected/" : "";?> >August</option>
										<option value="09" <?php echo (date('m')=="09")? "selected/" : "";?> >September</option>
										<option value="10" <?php echo (date('m')=="10")? "selected/" : "";?> >October</option>
										<option value="11" <?php echo (date('m')=="11")? "selected/" : "";?> >November</option>
										<option value="12" <?php echo (date('m')=="12")? "selected/" : "";?> >December</option>
									</select>
								</div>
							</div>
							<table class="table table-striped table-sales1">
								<thead>
									<tr>
										<td>No</td>
										<td>Toko</td>
										<td>Alamat</td>
										<td>Qty (Zak)</td>
										<td>Harga</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>No</td>
										<td>Toko</td>
										<td>Alamat</td>
										<td>Qty (Zak)</td>
										<td>Harga</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-xs-6" style="margin:0;padding-right:0">
					<div class="col-xs-12 nopadding">
						<div class="highlight">
							<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
								<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">Stok Toko per Area</font>
								<div style="float: right;margin-left:10px;">
									Pilih Area:
									<select class="p_stock">
										<option value="1">Area 1</option>
										<option value="2">Area 2</option>
										<option value="3">Area 3</option>
										<option value="4">Area 4</option>
										<option value="5">Area 5</option>
										<option value="6">Area 6</option>
										<option value="7">Area 7</option>
										<option value="8">Area 8</option>
									</select>
								</div>
								<div style="float: right;">
									Tipe Produk:
									<select class="p_product_stock">
									</select>
								</div>
							</div>
							<table class="table table-striped table-sales2">
							<thead>
								<tr>
									<td>No</td>
									<td>Toko</td>
									<td>Alamat</td>
									<td>Qty (Zak)</td>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<div class="col-xs-12" style="margin:0;padding-right:0">
					<div class="col-xs-6 nopadding" style="margin:0;">
						<div class="col-xs-12 nopadding">
							<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">Trend Harga Semen</font>
							</div>
							<div align="left" class="col-xs-12 nopadding" style="margin:5px 0;">
								<div style="float: right;margin-left:10px;">
									Tahun:
									<select class="p_thn_tren40">
										<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
										<option value="<?php echo $a?>"><?php echo $a?></option>
										<?php }?>
									</select>
								</div>
								<div style="float: right;margin-left:10px;">
									Bulan:
									<select class="p_bln_tren40">
										<option value="01" <?php echo (date('m')=="01")? "selected/" : "";?> >January</option>
										<option value="02" <?php echo (date('m')=="02")? "selected/" : "";?> >February</option>
										<option value="03" <?php echo (date('m')=="03")? "selected/" : "";?> >March</option>
										<option value="04" <?php echo (date('m')=="04")? "selected/" : "";?> >April</option>
										<option value="05" <?php echo (date('m')=="05")? "selected/" : "";?> >May</option>
										<option value="06" <?php echo (date('m')=="06")? "selected/" : "";?> >June</option>
										<option value="07" <?php echo (date('m')=="07")? "selected/" : "";?> >July</option>
										<option value="08" <?php echo (date('m')=="08")? "selected/" : "";?> >August</option>
										<option value="09" <?php echo (date('m')=="09")? "selected/" : "";?> >September</option>
										<option value="10" <?php echo (date('m')=="10")? "selected/" : "";?> >October</option>
										<option value="11" <?php echo (date('m')=="11")? "selected/" : "";?> >November</option>
										<option value="12" <?php echo (date('m')=="12")? "selected/" : "";?> >December</option>
									</select>
								</div>
								<div style="float: right;">
									Tipe Produk:
									<select class="p_prod_tren40">
									</select>
								</div>
								<div style="float: right;margin-right:10px;">
									Pilih Area:
									<select class="p_area_tren40">
										<option
										 value="1">Area 1</option>
										<option value="2">Area 2</option>
										<option value="3">Area 3</option>
										<option value="4">Area 4</option>
										<option value="5">Area 5</option>
										<option value="6">Area 6</option>
										<option value="7">Area 7</option>
										<option value="8">Area 8</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 nopadding">
								<div id="trenHarga1" class="chart highlight" style="height:39vh;"><div class="loader"></div></div>
							</div>
						</div>
					</div>
					<div class="col-xs-6" style="margin:0;padding-right:0">
						<div class="col-xs-12 nopadding">
							<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">Komparasi Harga Semen</font> </div>
							<div align="left" class="col-xs-12 nopadding" style="margin:5px 0;">
								<div style="float: right;margin-left:10px;">
									Tahun:
									<select class="p_thn_tren50">
										<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
										<option value="<?php echo $a?>"><?php echo $a?></option>
										<?php }?>
									</select>
								</div>
								<div style="float: right;margin-left:10px;">
									Bulan:
									<select class="p_bln_tren50">
										<option value="01" <?php echo (date('m')=="01")? "selected/" : "";?> >January</option>
										<option value="02" <?php echo (date('m')=="02")? "selected/" : "";?> >February</option>
										<option value="03" <?php echo (date('m')=="03")? "selected/" : "";?> >March</option>
										<option value="04" <?php echo (date('m')=="04")? "selected/" : "";?> >April</option>
										<option value="05" <?php echo (date('m')=="05")? "selected/" : "";?> >May</option>
										<option value="06" <?php echo (date('m')=="06")? "selected/" : "";?> >June</option>
										<option value="07" <?php echo (date('m')=="07")? "selected/" : "";?> >July</option>
										<option value="08" <?php echo (date('m')=="08")? "selected/" : "";?> >August</option>
										<option value="09" <?php echo (date('m')=="09")? "selected/" : "";?> >September</option>
										<option value="10" <?php echo (date('m')=="10")? "selected/" : "";?> >October</option>
										<option value="11" <?php echo (date('m')=="11")? "selected/" : "";?> >November</option>
										<option value="12" <?php echo (date('m')=="12")? "selected/" : "";?> >December</option>
									</select>
								</div>
								<div style="float: right;">
									Tipe Produk:
									<select class="p_prod_tren50">
									</select>
								</div>
								<div style="float: right;margin-right:10px;">
									Pilih Area:
									<select class="p_area_tren50">
										<option
										 value="1">Area 1</option>
										<option value="2">Area 2</option>
										<option value="3">Area 3</option>
										<option value="4">Area 4</option>
										<option value="5">Area 5</option>
										<option value="6">Area 6</option>
										<option value="7">Area 7</option>
										<option value="8">Area 8</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 nopadding">
								<div class="highlight" style="height:39vh;">
									<h1 align="center" style="margin-top:17vh">No Data Available<br>(Sementara POS masih diimplementasikan di toko-toko yang menjual Semen Gresik saja)</h1>
									<div id="trenHarga2" class="chart" style="opacity: 0;"><div class="loader"></div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--/#content -->
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="assets/js/pos.js"></script>
<style type="text/css">body{overflow:auto;}#header{position:fixed;top:0;left:0;z-index:20}.burger-menu{position:fixed;}#content{padding-top:64px;}.DataTables_Table_0{width:10px !important;}
.table-sales1 tr td {
    white-space: nowrap;
}
</style>