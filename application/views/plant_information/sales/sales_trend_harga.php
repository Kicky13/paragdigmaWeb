<style type="text/css">	
    .fusioncharts-caption{font-size:30px !important;}
    .col-md-9{padding-right:50px;}
    .col-md-9 .modal-title{float:right;margin-left:20px;font-size:12px;padding-top:3px;}
    .modal-header{background:#ed2d34;color:#fff;overflow:hidden;position: relative;}
    .modal-header select, .modal-header option{background:transparent;border:1px solid #fff;border-radius:0;color:#fff;background:#ed2d34;}
</style>
<div class="panel-heading">
	<div class="panel-title">
		<div class="col-md-1">
		</div>
		<div class="col-md-3" style="border-right: #005fbf;">
			<label>Company</label>
			<select id="p_opco" class="form-control">
				<option value="7000">Semen Indonesia</option>
				<option value="4000">Semen Tonasa</option>
				<option value="3000">Semen Padang</option>
				<option value="6000">TLCC</option>
			</select>
		</div>  
	</div>        
</div>
<div class="panel-body">
    <div class="row">
        <div id="chart1"></div>
        <div id="chart2" style="display:none;"></div>
    </div>        
</div>

<div class="modal fade" id="modalHarga" role="dialog">
    <div class="modal-dialog" style="width:80%; margin-top:100px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="background:#ff4b50;position: absolute;top:2px;right:0px;bottom:0;width:50px;color:#fff;opacity:1;border-radius:0;z-index:9;">&times;</button>
          <div class="col-md-3">
         	 <h4 class="modal-title title-provinsi">Nama Propinsi</h4>
          </div>
          <div class="col-md-9">
         	<h4 class="modal-title">Tahun: 
         		<select class="select" id="p_tahun">
         	 		<option value="2017">2017</option>
         	 		<option value="2016">2016</option>
         	 	</select>
         	</h4>
         	<h4 class="modal-title">Produk: 
         		<select class="select" id="p_product">
         	 	</select>
         	</h4>
         	<h4 class="modal-title">Kota: 
         		<select class="select" id="p_kota">
         	 	</select>
         	</h4>
         	<h4 class="modal-title">Incoterm: 
         		<select class="select" id="p_incoterm">
					<option value="FRC">FRANCO</option>
					<option value="FOT">FREE ON TRUCK</option>
					<option value="FOB">FREE ON BOARD</option>
					<option value="CNF">COST AND FREIGHT</option>
					<option value="CIF">COST, INSURANCE AND FREIGHT</option>
         	 	</select>
         	</h4>
          </div>
      </div>
      <div class="modal-body">
          <div id="trend1" class="chart" style="height:30vh;">
			<div class="loader" style="margin-top:5%;"></div>
		  </div>
      </div>
    </div>
  </div>


<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts/js/fusioncharts-jquery-plugin.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts/js/fusioncharts.maps.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts/js/maps/fusioncharts.indonesia.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts/js/maps/fusioncharts.vietnam.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/marketshare/fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<script src="<?= base_url('assets/marketshare/chartjs/dist/Chart.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
	peta = new FusionCharts("maps/indonesia", "chartobject-1", "100%", "500", "chart1", "json");
	peta2 = new FusionCharts("maps/vietnam", "chartobject-2", "100%", "500", "chart2", "json");
	var dataChart = {
		   "chart":{
		      "caption":"Trend Harga Tebus Distributor",
		      "theme":"fint",
		      "formatNumberScale":"0",
		      "showLabels":"1",
		      "showLegend":"0",
		      "includeNameInLabels":"1",
		      "nullEntityColor":"#C2C2D6",
		      "entityFillHoverColor": "#ed2d34",
		      "useSNameInLabels":"1",
		      "legendPosition":"bottom",
		      "showToolTip":"1",
		      "baseFontSize":"14",
		      "legendItemFontColor":"#000",
		      "toolTipBgColor":"#ed2d34",
			},
			"colorrange": {
				"color": [
				  {
					"minvalue": "1",
					"maxvalue": "2",
					"code": "#49ff56",
					"displayValue": ""
				  }
				]
			},
			"entityDef":[
				{
				  "internalId": "01",
				  "newId": "6002"
				},
				{
				  "internalId": "02",
				  "newId": "1026"
				},
				{
				  "internalId": "35",
				  "newId": "1017"
				},
				{
				  "internalId": "33",
				  "newId": "1020"
				},
				{
				  "internalId": "03",
				  "newId": "1018"
				},
				{
				  "internalId": "07",
				  "newId": "1023"
				},
				{
				  "internalId": "13",
				  "newId": "1031"
				},
				{
				  "internalId": "21",
				  "newId": "1036"
				},
				{
				  "internalId": "08",
				  "newId": "1025"
				},
				{
				  "internalId": "14",
				  "newId": "1032"
				},
				{
				  "internalId": "18",
				  "newId": "1028"
				},
				{
				  "internalId": "34",
				  "newId": "1038"
				},
				{
				  "internalId": "04",
				  "newId": "1021"
				},
				{
				  "internalId": "05",
				  "newId": "1015"
				},
				{
				  "internalId": "15",
				  "newId": "1019"
				},
				{
				  "internalId": "28",
				  "newId": "1039"
				},
				{
				  "internalId": "42",
				  "newId": "1043"
				},
				{
				  "internalId": "29",
				  "newId": "1040"
				},
				{
				  "internalId": "31",
				  "newId": "1037"
				},
				{
				  "internalId": "26",
				  "newId": "1011"
				},
				{
				  "internalId": "36",
				  "newId": "1041"
				},
				{
				  "internalId": "37",
				  "newId": "1013"
				},
				{
				  "internalId": "40",
				  "newId": "1014"
				},
				{
				  "internalId": "22",
				  "newId": "1035"
				},
				{
				  "internalId": "12",
				  "newId": "1030"
				},
				{
				  "internalId": "38",
				  "newId": "1033"
				},
				{
				  "internalId": "32",
				  "newId": "1016"
				},
				{
				  "internalId": "30",
				  "newId": "1022"
				},
				{
				  "internalId": "11",
				  "newId": "1029"
				},
				{
				  "internalId": "17",
				  "newId": "1027"
				},
				{
				  "internalId": "39",
				  "newId": "1042"
				},
				{
				  "internalId": "41",
				  "newId": "1034"
				},
				{
				  "internalId": "24",
				  "newId": "1012"
				},
				{
				  "internalId": "10",
				  "newId": "1024"
				}
			],
			"data": []
		}
	peta.setChartData(dataChart);
	var dataChart2 = { 
		   "chart":{
		      "caption":"Trend Harga Tebus",
		      "theme":"fint",
		      "formatNumberScale":"0",
		      "showLabels":"1",
		      "showLegend":"0",
		      "includeNameInLabels":"1",
		      "nullEntityColor":"#C2C2D6",
		      "entityFillHoverColor": "#ed2d34",
		      "useSNameInLabels":"1",
		      "legendPosition":"bottom",
		      "showToolTip":"1",
		      "baseFontSize":"14",
		      "legendItemFontColor":"#000",
		      "toolTipBgColor":"#ed2d34",
			},
			"colorrange": {
				"color": [
				  {
					"minvalue": "1",
					"maxvalue": "2",
					"code": "#49ff56",
					"displayValue": ""
				  }
				]
			},
			"entityDef":[
				{"internalId":"VN.BV","newId":"6002"},
				{"internalId":"VN.BD","newId":"6008"},
				{"internalId":"VN.BU","newId":"6011"},
				{"internalId":"VN.HU","newId":"6028"},
				{"internalId":"VN.HC","newId":"6029"},
				{"internalId":"VN.KG","newId":"6033"},
				{"internalId":"VN.KT","newId":"6034"},
				{"internalId":"VN.VL","newId":"6061"},
				{"internalId":"VN.BN","newId":"6006"},
				{"internalId":"VN.CN","newId":"6013"},
				{"internalId":"VN.DT","newId":"6020"},
				{"internalId":"VN.HT","newId":"6025"},
				{"internalId":"VN.HO","newId":"6030"},
				{"internalId":"VN.KH","newId":"6032"},
				{"internalId":"VN.LI","newId":"6035"},
				{"internalId":"VN.LS","newId":"6037"},
				{"internalId":"VN.TT","newId":"6057"},
				{"internalId":"VN.TG","newId":"6058"},
				{"internalId":"VN.TV","newId":"6059"},
				{"internalId":"VN.YB","newId":"6063"},
				{"internalId":"VN.DA","newId":"6015"},
				{"internalId":"VN.NA","newId":"6041"},
				{"internalId":"VN.QM","newId":"6047"},
				{"internalId":"VN.QG","newId":"6048"}, 
				{"internalId":"VN.QN","newId":"6049"}, 
				{"internalId":"VN.AG","newId":"6001"},
				{"internalId":"VN.BG","newId":"6003"},
				{"internalId":"VN.BL","newId":"6005"},
				{"internalId":"VN.BI","newId":"6009"}, 
				{"internalId":"VN.LA","newId":"6039"},
				{"internalId":"VN.QT","newId":"6050"},
				{"internalId":"VN.TN","newId":"6053"},
				{"internalId":"VN.TH","newId":"6056"},
				{"internalId":"VN.CB","newId":"6014"},
				{"internalId":"VN.DN","newId":"6019"},
				{"internalId":"VN.HG","newId":"6022"},
				{"internalId":"VN.HD","newId":"6026"},
				{"internalId":"VN.ND","newId":"6040"},
				{"internalId":"VN.ST","newId":"6051"},
				{"internalId":"VN.TQ","newId":"6060"},
				{"internalId":"VN.DO","newId":"6017"},
				{"internalId":"VN.GL","newId":"6021"},
				{"internalId":"VN.HP","newId":"6027"},
				{"internalId":"VN.HY","newId":"6031"},
				{"internalId":"VN.NT","newId":"6043"}, 
				{"internalId":"VN.TB","newId":"6054"},
				{"internalId":"VN.TY","newId":"6055"},
				{"internalId":"VN.VC","newId":"6062"},
				{"internalId":"VN.BK","newId":"6004"},
				{"internalId":"VN.LO","newId":"6038"},
				{"internalId":"VN.NB","newId":"6042"},
				{"internalId":"VN.PT","newId":"6044"},
				{"internalId":"VN.PY","newId":"6045"},
				{"internalId":"VN.SL","newId":"6052"},
				{"internalId":"VN.BR","newId":"6007"},
				{"internalId":"VN.BP","newId":"6010"}, 
				{"internalId":"VN.CM","newId":"6012"},
				{"internalId":"VN.DC","newId":"6016"},
				{"internalId":"VN.DB","newId":"6018"},
				{"internalId":"VN.HM","newId":"6023"},
				{"internalId":"VN.HN","newId":"6024"},
				{"internalId":"VN.LD","newId":"6036"},
				{"internalId":"VN.QB","newId":"6046"}
			],
			"data": []
		}
	peta2.setChartData(dataChart2);
	
	var p_opco = 7000;
	var p_provinsi = "";
	var p_kota = "";
	var p_product = "";
	var p_incoterm = $("#p_incoterm").val();
	var p_incoterm_nama = $("#p_incoterm[value="+p_incoterm+"]").html();
	var p_tahun = $("#p_tahun").val();
	var loadingPopup = false;
	var prov_data = [];
	var incoterm = {FRC:"FRANCO",FOT:"FREE ON TRUCK",FOB:"FREE ON BOARD",CNF:"COST AND FREIGHT",CIF:"COST, INSURANCE AND FREIGHT"}
	
	var urlProv = "Trend_harga_tebus/get_data_prop";
	var urlKota = "Trend_harga_tebus/get_data_kota";
	var urlProduk = "Trend_harga_tebus/get_data_produk";
	var urlHarga = "Trend_harga_tebus/get_trend_"+p_opco;
	if(parseFloat(p_opco)==3000){
		urlProv = "Harga_tebus/get_data_province_SP";
		urlKota = "Harga_tebus/get_data_kota_SP";
		urlProduk = "Harga_tebus/get_data_material_SP";
		urlHarga = "Harga_tebus/get_data_harga_tebus_SP";
	}
	$.getJSON(base_url+urlProv+"?comp="+p_opco, function(data){
		if(p_opco==6000){
			dataChart2.data = [];
			for(var i=0;i<data.length;i++){
				prov_data[data[i].KODE_PROP]=data[i].NAMA_PROP;
				dataChart2.data.push({"value": 1,"id": data[i].KODE_PROP,"tooltext":data[i].NAMA_PROP});
			}
			peta2.setChartData(dataChart2);
		}else{
			dataChart.data = [];
			for(var i=0;i<data.length;i++){
				prov_data[data[i].KODE_PROP]=data[i].NAMA_PROP;
				dataChart.data.push({"value": 1,"id": data[i].KODE_PROP,"tooltext":data[i].NAMA_PROP});
			}
			peta.setChartData(dataChart);
		}
	});
	peta.addEventListener("entityClick", function (e, d) {
		if(prov_data[d.id]){
			$(".loading_overlay").removeClass('opacity-on');
			$(".loading_overlay").css({'opacity':".8"});
			getDetail(d);
		}
	});
	peta2.addEventListener("entityClick", function (e, d) {
		if(prov_data[d.id]){
			$(".loading_overlay").removeClass('opacity-on');
			$(".loading_overlay").css({'opacity':".8"});
			getDetail(d);
		}
	});
	peta.render("chart1");
	peta2.render("chart2");
	
	function getDetail(prov) {
		p_provinsi = prov.id;
		
		$(".title-provinsi").html(prov_data[prov.id]);
		loadingPopup = true;
		var loadInt = 0;
		var loadBatas = 2;
		$.getJSON(base_url+urlKota+"?kodeprop="+prov.id+"&comp="+p_opco+"&tahun="+p_tahun, function(data){
			html = "";
			for(var i=0;i<data.length;i++){
				if(i==0){
					p_kota = data[i].KOTA;
				}
				html += '<option value="'+data[i].KOTA+'">'+data[i].NM_KOTA+'</option>';
			}
			$("#p_kota").html(html);
			$.getJSON(base_url+urlProduk+"?kodeprop="+prov.id+"&comp="+p_opco+"&kdkota="+p_kota+"&tahun="+p_tahun, function(data){
				html = "";
				for(var i=0;i<data.length;i++){
					if(i==0){
						p_product = data[i].KODE_PRODUK;
					}
					html += '<option value="'+data[i].KODE_PRODUK+'">'+data[i].NAMA_PRODUK+'</option>';
				}
				$("#p_product").html(html);
				
				$(".loading_overlay").addClass('opacity-on');
				$(".loading_overlay").css({'opacity':"1"});
				$("#modalHarga").modal();
				salesArea();
				
			});
		});
		
	}
	$(document).ready(function(){
		$("#p_kota").change(function(){
			p_kota = $(this).val();
			$("#trend1").html('<div class="loader" style="margin-top:5%;"></div>');
			$.getJSON(base_url+urlProduk+"?kodeprop="+p_provinsi+"&comp="+p_opco+"&kdkota="+p_kota+"&tahun="+p_tahun, function(data){
				html = "";
				for(var i=0;i<data.length;i++){
					if(i==0){
						p_product = data[i].KODE_PRODUK;
					}
					html += '<option value="'+data[i].KODE_PRODUK+'">'+data[i].NAMA_PRODUK+'</option>';
				}
				$("#p_product").html(html);
				salesArea();
			});
		});
		$("#p_product").change(function(){
			p_product = $(this).val();
			salesArea();
		});
		$("#p_tahun").change(function(){
			p_tahun = $(this).val();
			salesArea();
		});
		$("#p_incoterm").change(function(){
			p_incoterm = $(this).val();
			p_incoterm_nama = $("#p_incoterm[value="+p_incoterm+"]").html();
			salesArea();
		});
		$("#p_opco").change(function(){
			p_opco = $(this).val();
			console.log(p_opco);
			if(parseInt(p_opco)==6000){
				$('#chart1').hide();
				$('#chart2').show();
			}else{
				$('#chart1').show();
				$('#chart2').hide();
			}
			urlProv = "Trend_harga_tebus/get_data_prop";
			urlKota = "Trend_harga_tebus/get_data_kota";
			urlProduk = "Trend_harga_tebus/get_data_produk";
			urlHarga = "Trend_harga_tebus/get_trend_"+p_opco;
			if(parseInt(p_opco)==3000){
				urlProv = "Harga_tebus/get_data_province_SP";
				urlKota = "Harga_tebus/get_data_kota_SP";
				urlProduk = "Harga_tebus/get_data_material_SP";
				urlHarga = "Harga_tebus/get_data_harga_tebus_SP";
			}
			$(".loading_overlay").removeClass('opacity-on');
			$(".loading_overlay").css({'opacity':".8"});
			$.getJSON(base_url+urlProv+"?comp="+p_opco, function(data){
				if(p_opco==6000){
					dataChart2.data = [];
					for(var i=0;i<data.length;i++){
						prov_data[data[i].KODE_PROP]=data[i].NAMA_PROP;
						dataChart2.data.push({"value": 1,"id": data[i].KODE_PROP,"tooltext":data[i].NAMA_PROP});
					}
					peta2.setChartData(dataChart2);
				}else{
					dataChart.data = [];
					for(var i=0;i<data.length;i++){
						prov_data[data[i].KODE_PROP]=data[i].NAMA_PROP;
						dataChart.data.push({"value": 1,"id": data[i].KODE_PROP,"tooltext":data[i].NAMA_PROP});
					}
					peta.setChartData(dataChart);
				}
				$(".loading_overlay").addClass('opacity-on');
				$(".loading_overlay").css({'opacity':"1"});
			});
		});
	});
	var labelChart = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

	function salesArea(){
		$("#trend1").html('<div class="loader" style="margin-top:5%;"></div>');
		$.getJSON(base_url+urlHarga+"?kdpropinsi="+p_provinsi+"&kdkota="+p_kota+"&tahun="+p_tahun+"&kode_produk="+p_product+"&incoterm="+p_incoterm, function(data){
			
			var series_data=[];
			var colorx = ['#1E8BC3','#ffcc00'];
			var a=0;
			for(var x in data[p_incoterm]){
				var datax = [];
				for(var i=0;i<data[p_incoterm][x].length;i++){
					datax.push(parseFloat(data[p_incoterm][x][i].HARGA));
				}
				series_data.push({name: 'Harga '+x,color: colorx[a],data: datax});
				a++;
			}
			Highcharts.chart('trend1',{
				chart: {
					type: 'spline',
					spacingBottom: 8,
					spacingTop: 8,
					spacingLeft: 5,
					spacingRight: 5,
					animation: Highcharts.svg
				},
				title: {
					text: incoterm[p_incoterm]
				},
				xAxis: {
					categories: labelChart
				},
				yAxis: {
					title: {
						text: ''
					}
				},
				credits: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				legend: {
					enabled: true
				},
				tooltip: {
					headerFormat: '<b>{point.x}</b><br/>',
					pointFormat: '{series.name}: {point.y:,.0f}'
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: true,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: series_data
			});
		});
	
	}
</script>