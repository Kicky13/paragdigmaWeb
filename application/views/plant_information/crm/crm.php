<section id="content" class="finance">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#fff;margin-top:10px;">
			<div class="col-xs-12 nopadding" style="padding-right:15px;">
				<div class="col-xs-12 nopadding" style="margin:0;padding-left:15px">
					<div class="col-xs-12 nopadding">
						<div align="left" class="col-xs-12" style="margin-bottom:5px;">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">TREND HARGA TOKO ZAK <?php echo $kemasan?>KG</font>
							<div style="float: right;margin-left:10px;">
								Tahun:
								<select class="p_thn_saletokoarea">
									<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
									<option value="<?php echo $a?>"><?php echo $a?></option>
									<?php }?>
								</select>
							</div>
							<div style="float: right;margin-left:10px;">
								Bulan:
								<select class="p_bln_saletokoarea">
									<option value="01" <?php echo (date('m', strtotime(date('Y-m')))=="01")? "selected/" : "";?> >January</option>
									<option value="02" <?php echo (date('m', strtotime(date('Y-m')))=="02")? "selected/" : "";?> >February</option>
									<option value="03" <?php echo (date('m', strtotime(date('Y-m')))=="03")? "selected/" : "";?> >March</option>
									<option value="04" <?php echo (date('m', strtotime(date('Y-m')))=="04")? "selected/" : "";?> >April</option>
									<option value="05" <?php echo (date('m', strtotime(date('Y-m')))=="05")? "selected/" : "";?> >May</option>
									<option value="06" <?php echo (date('m', strtotime(date('Y-m')))=="06")? "selected/" : "";?> >June</option>
									<option value="07" <?php echo (date('m', strtotime(date('Y-m')))=="07")? "selected/" : "";?> >July</option>
									<option value="08" <?php echo (date('m', strtotime(date('Y-m')))=="08")? "selected/" : "";?> >August</option>
									<option value="09" <?php echo (date('m', strtotime(date('Y-m')))=="09")? "selected/" : "";?> >September</option>
									<option value="10" <?php echo (date('m', strtotime(date('Y-m')))=="10")? "selected/" : "";?> >October</option>
									<option value="11" <?php echo (date('m', strtotime(date('Y-m')))=="11")? "selected/" : "";?> >November</option>
									<option value="12" <?php echo (date('m', strtotime(date('Y-m')))=="12")? "selected/" : "";?> >December</option>
								</select>
							</div>
							<div style="float: right;margin-left:10px;">
								Provinsi:
								<select class="p_provinsi_saletokoarea">
								</select>
							</div>
							<div style="float: right;margin-left:10px;">
								Kota:
								<select class="p_kota_saletokoarea">
								</select>
							</div>
						</div>
						<div class="col-xs-12 nopadding">
							<div class="col-xs-6 nopadding">
								<div class="col-xs-12">
									<div id="boxplot_jual_<?php echo $kemasan?>" class="chart highlight" style="height:41vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
								<div class="col-xs-12">
									<div id="boxplot_beli_<?php echo $kemasan?>" class="chart highlight" style="height:41vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 nopadding">
								<div class="col-xs-12">
									<div id="bar_margin_<?php echo $kemasan?>" class="chart highlight" style="height:41vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
								<div class="col-xs-12">
									<div id="disparitas_<?php echo $kemasan?>" class="chart highlight" style="height:41vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php /*
					<div class="col-xs-12 nopadding">
						<div align="left" class="col-xs-12 nopadding" style="margin-bottom:5px;">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;<font style="margin-bottom: 8px; font-size: 16px; font-weight: bold;text-transform: uppercase;">TREND HARGA TOKO ZAK 50KG</font>
							<div style="float: right;margin-left:10px;">
								Tahun:
								<select class="p_thn_saletokoarea">
									<?php for($a=(int) date('Y');$a>=(((int) date('Y'))-2);$a--){ ?>
									<option value="<?php echo $a?>"><?php echo $a?></option>
									<?php }?>
								</select>
							</div>*/?>
							<?php /*
							<div style="float: right;">
								Bulan:
								<select class="p_bln_saletokoarea">
									<option value="01" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="01")? "selected/" : "";?> >January</option>
									<option value="02" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="02")? "selected/" : "";?> >February</option>
									<option value="03" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="03")? "selected/" : "";?> >March</option>
									<option value="04" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="04")? "selected/" : "";?> >April</option>
									<option value="05" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="05")? "selected/" : "";?> >May</option>
									<option value="06" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="06")? "selected/" : "";?> >June</option>
									<option value="07" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="07")? "selected/" : "";?> >July</option>
									<option value="08" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="08")? "selected/" : "";?> >August</option>
									<option value="09" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="09")? "selected/" : "";?> >September</option>
									<option value="10" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="10")? "selected/" : "";?> >October</option>
									<option value="11" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="11")? "selected/" : "";?> >November</option>
									<option value="12" <?php echo (date('m', strtotime(date('Y-m')." -1 month"))=="12")? "selected/" : "";?> >December</option>
								</select>
							</div>
							*/?>
						<?php /*
						</div>
						<div class="col-xs-12 nopadding">
							<div class="col-xs-6 nopadding">
								<div class="col-xs-12">
									<div id="boxplot_jual_50" class="chart highlight" style="height:18vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
								<div class="col-xs-12">
									<div id="boxplot_beli_50" class="chart highlight" style="height:18vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 nopadding">
								<div class="col-xs-6">
									<div id="bar_margin_50" class="chart highlight" style="height:38.5vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
								<div class="col-xs-6">
									<div id="disparitas_50" class="chart highlight" style="height:38.5vh;">
										<div class="loader" style="margin-top:5%;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>*/?>
				</div>
			</div>
		</div>
	</div>
</section><!--/#content -->
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts_3_12_2/fusioncharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts_3_12_2/themes/fusioncharts.theme.fint.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts_3_12_2/themes/fusioncharts.theme.zune.js"></script>
<script>
	var base_url = "<?php echo base_url(); ?>";
	var kemasan = "<?php echo $kemasan;?>";
</script>
<script src="assets/js/crm.js"></script>
<style type="text/css">
body{overflow:auto;}
#header{position:fixed;top:0;left:0;z-index:20}
.burger-menu{position:fixed;}
#content{padding-top:64px;}
.DataTables_Table_0{width:10px !important;}
.table-sales1 tr td {
    white-space: nowrap;
}

#boxplot_jual_40 svg>g[class^='creditgroup'],#boxplot_beli_40 svg>g[class^='creditgroup'],#bar_margin_40 svg>g[class^='creditgroup'],#disparitas_40 svg>g[class^='creditgroup'],#boxplot_jual_50 svg>g[class^='creditgroup'],#boxplot_beli_50 svg>g[class^='creditgroup'],#bar_margin_50 svg>g[class^='creditgroup'],#disparitas_50 svg>g[class^='creditgroup']{
	display:none;
}
/*
svg text.fusioncharts-caption{
	color:#000!important;
	fill: rgb(0, 0, 0) !important;
}
svg text.highcharts-title{
	font-size:14px!important;
}*/
svg text{
	font-weight:normal !important;
	font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif !important;
}
</style>