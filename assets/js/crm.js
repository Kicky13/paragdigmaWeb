function format_number(nominal){
	if((typeof nominal)=="string"){
		nominal = nominal.split(',').join('');
		nominal = parseFloat(nominal);
	}
	return nominal;
}
function numberFormat(x) {
    var nominal = parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return nominal.replace(".","|").split(",").join('.').replace('|',',');
}

// var color2 = ["","#007f01","#db3af9","#f04736","#1d8bc3","#98289f","#fd2892","#AD847A","#54323a","#653daf"];

/*--------------------------------------------------------
	DROPDOWN AREA
--------------------------------------------------------*/
var date = new Date();
var p_tahun_selected = date.getFullYear();
var p_bulan_selected = (date.getMonth()+1 < 10)? "0"+(date.getMonth()+1) : date.getMonth()+1;
var p_provinsi_selected = "";
var p_kota_selected = "";
$.getJSON(base_url+"Harga_tebus_toko/getProvinsi", function(data){
	var htmlx = "<option value=''>All</option>";
	for(i=0;i<data.length;i++){
		htmlx += "<option value='"+data[i].C_REGION_ID+"'>"+data[i].NAME+"</option>";
	}
	$(".p_provinsi_saletokoarea").html(htmlx);
});
function getKota(){
	$.getJSON(base_url+"Harga_tebus_toko/getKota?provinsi="+p_provinsi_selected, function(data){
		var htmlx = "<option value=''>All</option>";
		for(i=0;i<data.length;i++){
			htmlx += "<option value='"+data[i].C_CITY_ID+"'>"+data[i].NAMA_KOTA+"</option>";
		}
		$(".p_kota_saletokoarea").html(htmlx);
	});
}
getKota();
$(".p_thn_saletokoarea").change(function(){
	p_tahun_selected=$(this).val();
	if(parseInt(kemasan)==40){
		boxplotJual40();
		boxplotBeli40();
		barMargin40();
		chartDisparitas40();
	}else{
		boxplotJual50();
		boxplotBeli50();
		barMargin50();
		chartDisparitas50();
	}
	$(".loading_overlay").addClass('opacity-on');
});
$(".p_bln_saletokoarea").change(function(){
	p_bulan_selected=$(this).val();
	if(parseInt(kemasan)==40){
		boxplotJual40();
		boxplotBeli40();
		barMargin40();
		chartDisparitas40();
	}else{
		boxplotJual50();
		boxplotBeli50();
		barMargin50();
		chartDisparitas50();
	}
});
$(".p_provinsi_saletokoarea").change(function(){
	p_provinsi_selected=$(this).val();
	getKota();
	if(parseInt(kemasan)==40){
		boxplotJual40();
		boxplotBeli40();
		barMargin40();
		chartDisparitas40();
	}else{
		boxplotJual50();
		boxplotBeli50();
		barMargin50();
		chartDisparitas50();
	}
});
$(".p_kota_saletokoarea").change(function(){
	p_kota_selected=$(this).val();
	if(parseInt(kemasan)==40){
		boxplotJual40();
		boxplotBeli40();
		barMargin40();
		chartDisparitas40();
	}else{
		boxplotJual50();
		boxplotBeli50();
		barMargin50();
		chartDisparitas50();
	}
});
/*--------------------------------------------------------
	END DROPDOWN AREA
--------------------------------------------------------*/
if(parseInt(kemasan)==40){
	/*-------------------------------------------------------
		ZAK 40KG
	--------------------------------------------------------*/
	var boxplot_jual_40 = new FusionCharts("boxandwhisker2d","chartobject-1", "100%", "100%", "boxplot_jual_40", "json");
	var dataChartJual40 = {
		"chart": {
			"caption": "Boxplot Harga Jual",
			"paletteColors": "#cc6600,#afd8f8,#afd8f8,#d64646,#d64646,#b3aa00,#b3aa00,#008ed6,#008ed6,#2dcc00,#2dcc00,#f26d7d,#f26d7d,#f6bd0f,#f6bd0f,#008e8e,#008e8e,#9d080d,#9d080d,#ff8e46,#ff8e46,#fff200,#fff200,#8bba00,#8bba00,#aba000,#aba000,#a186be,#a186be,#8e468e,#8e468e,#588526,#588526,#cc6600",
			"bgColor": "#ffffff",
			"captionFontSize": "14",
			"subcaptionFontSize": "14",
			"subcaptionFontBold": "0",
			"showAlternateHGridColor": "0",
			"legendShadow": "0",
			"legendPosition": "right",
			"showValues": "0",
			"toolTipColor": "#ffffff",
			"toolTipBgColor": "#000000",
			"toolTipBgAlpha": "80",
			"toolTipPadding": "5",
			"useroundedges": "1",
			"plotspacepercent": "70",
			"toolTipBorderRadius": "2",
			"toolTipBorderThickness": "0",
			"tooltipbordercolor": "138dd7",
			"showplotborder": "0",
			"showcanvasborder": "0",
			"legendborderalpha": "0",
			"canvasborderalpha": "0",
			"showborder": "0",
			"plottooltext": "<div id='headerdiv'>$seriesname</div><div><table width='120' border='1'><tr><td class='labelDiv'>Maximum</td><td class='allpadding'>$maxDatavalue</td></tr><tr><td class='labelDiv'>Q3</td><td class='allpadding'>$Q3</td></tr><tr><td class='labelDiv'>Median</td><td class='allpadding'>$median</td></tr><tr><td class='labelDiv'>Q1</td><td class='allpadding'>$Q1</td></tr><tr><td class='labelDiv'>Minimum</td><td class='allpadding'>$minDataValue</td></tr></table></div>"
		},
		"categories": [],
		"dataset": []
	};
	function boxplotJual40(){
		if($("#boxplot_jual_40 .loader").length<1){
			$("#boxplot_jual_40").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#boxplot_jual_40 .loader").show();
		$("#boxplot_jual_40 #chartobject-1").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataHargaJualPerKemasan?kemasan=40&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			dataChartJual40.categories = data.categories;
			dataChartJual40.dataset = data.dataset;
			$("#boxplot_jual_40 .loader").hide();
			$("#boxplot_jual_40 #chartobject-1").show();
			boxplot_jual_40.setChartData(dataChartJual40);
			setTimeout(function(){
				$('#boxplot_jual_40 #chartobject-1').append("<div style='position: absolute;top: 17px;right: 94px;'><input type='checkbox' class='p_boxplot_jual_40_all' id='p_boxplot_jual_40_all' checked='checked' name='p_boxplot_jual_40_all' value='true'> <label for='p_boxplot_jual_40_all'>Select All</label></div>");
				$('.p_boxplot_jual_40_all').click(function(){
					if($('.p_boxplot_jual_40_all:checked').val()){
						for(var i=0;i<dataChartJual40.dataset.length;i++){
							dataChartJual40.dataset[i]['visible']=true;
						}
					}else{
						for(var i=0;i<dataChartJual40.dataset.length;i++){
							dataChartJual40.dataset[i]['visible']=false;
						}
					}
					boxplot_jual_40.setChartData(dataChartJual40);
				});
			},2000);
		});
	}
	boxplotJual40();
	boxplot_jual_40.render("boxplot_jual_40");

	var boxplot_beli_40 = new FusionCharts("boxandwhisker2d","chartobject-2", "100%", "100%", "boxplot_beli_40", "json");
	var dataChartBeli40 = {
		"chart": {
			"caption": "Boxplot Harga Tebus",
			"paletteColors": "#cc6600,#afd8f8,#afd8f8,#d64646,#d64646,#b3aa00,#b3aa00,#008ed6,#008ed6,#2dcc00,#2dcc00,#f26d7d,#f26d7d,#f6bd0f,#f6bd0f,#008e8e,#008e8e,#9d080d,#9d080d,#ff8e46,#ff8e46,#fff200,#fff200,#8bba00,#8bba00,#aba000,#aba000,#a186be,#a186be,#8e468e,#8e468e,#588526,#588526,#cc6600",
			"bgColor": "#ffffff",
			"captionFontSize": "14",
			"subcaptionFontSize": "14",
			"subcaptionFontBold": "0",
			"showAlternateHGridColor": "0",
			"legendShadow": "0",
			"legendPosition": "right",
			"showValues": "0",
			"toolTipColor": "#ffffff",
			"toolTipBgColor": "#000000",
			"toolTipBgAlpha": "80",
			"toolTipPadding": "5",
			"useroundedges": "1",
			"plotspacepercent": "70",
			"toolTipBorderRadius": "2",
			"toolTipBorderThickness": "0",
			"tooltipbordercolor": "138dd7",
			"showplotborder": "0",
			"showcanvasborder": "0",
			"legendborderalpha": "0",
			"canvasborderalpha": "0",
			"showborder": "0",
			"plottooltext": "<div id='headerdiv'>$seriesname</div><div><table width='120' border='1'><tr><td class='labelDiv'>Maximum</td><td class='allpadding'>$maxDatavalue</td></tr><tr><td class='labelDiv'>Q3</td><td class='allpadding'>$Q3</td></tr><tr><td class='labelDiv'>Median</td><td class='allpadding'>$median</td></tr><tr><td class='labelDiv'>Q1</td><td class='allpadding'>$Q1</td></tr><tr><td class='labelDiv'>Minimum</td><td class='allpadding'>$minDataValue</td></tr></table></div>"
		},
		"categories": [],
		"dataset": []
	};
	
	function boxplotBeli40(){
		if($("#boxplot_beli_40 .loader").length<1){
			$("#boxplot_beli_40").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#boxplot_beli_40 .loader").show();
		$("#boxplot_beli_40 #chartobject-2").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataHargaJualPerKemasan?kemasan=40&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			dataChartBeli40.categories = data.categories;
			dataChartBeli40.dataset = data.dataset;
			$("#boxplot_beli_40 .loader").hide();
			$("#boxplot_beli_40 #chartobject-2").show();
			boxplot_beli_40.setChartData(dataChartBeli40);
			setTimeout(function(){
				$('#boxplot_beli_40 #chartobject-2').append("<div style='position: absolute;top: 17px;right: 94px;'><input type='checkbox' class='p_boxplot_beli_40_all' id='p_boxplot_beli_40_all' checked='checked' name='p_boxplot_beli_40_all' value='true'> <label for='p_boxplot_beli_40_all'>Select All</label></div>");
				$('.p_boxplot_beli_40_all').click(function(){
					if($('.p_boxplot_beli_40_all:checked').val()){
						for(var i=0;i<dataChartBeli40.dataset.length;i++){
							dataChartBeli40.dataset[i]['visible']=true;
						}
					}else{
						for(var i=0;i<dataChartBeli40.dataset.length;i++){
							dataChartBeli40.dataset[i]['visible']=false;
						}
					}
					boxplot_beli_40.setChartData(dataChartBeli40);
				});
			},2000);
		});
	}
	boxplotBeli40();
	boxplot_beli_40.render("boxplot_beli_40");
	
	var bar_margin_40 = new FusionCharts("column2d","chartobject-8", "100%", "100%", "bar_margin_40", "json");
	var dataChartMargin40 = {
		"chart": {
			"caption": "Margin Toko 30 hari Terakhir (%)",
			"paletteColors": "#afd8f8,#f6bd0f,#8bba00,#ff8e46,#008e8e,#d64646,#8e468e,#588526,#b3aa00,#008ed6,#9d080d,#a186be,#cc6600,#2dcc00,#aba000,#f26d7d,#fff200",
			"bgColor": "#ffffff",
			"captionpadding": "20",
			"showvalues": "0",
			"plotgradientcolor": "",
			"rotatelabels": "1",
			"slantlabels": "1",
			"showAlternateHGridColor": "0",
			"divlinealpha": "40",
			"tooltipfontbold": "1",
			"tooltipbgalpha": "80",
			"showtooltipshadow": "0",
			"tooltipbordercolor": "138dd7",
			"showplotborder": "0",
			"showcanvasborder": "0",
			"legendborderalpha": "0",
			"canvasborderalpha": "0",
			"showborder": "0",
		},
		"data": []
	};
	function barMargin40(){
		if($("#bar_margin_40 .loader").length<1){
			$("#bar_margin_40").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#bar_margin_40 .loader").show();
		$("#bar_margin_40 #chartobject-8").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataMargin?kemasan=40&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			var datax = [];
			for(var i=0;i<data.length;i++){
				datax.push({"label": data[i].NAME,"value": data[i].MARGIN[0],"tooltext": data[i].NAME+" : "+data[i].MARGIN[0]+"%"});
			}
			dataChartMargin40.data=datax;
			$("#bar_margin_40 .loader").hide();
			$("#bar_margin_40 #chartobject-8").show();
			bar_margin_40.setChartData(dataChartMargin40);
		});
	}
	barMargin40();
	bar_margin_40.render("bar_margin_40");
	
	var chart_disparitas_40 = new FusionCharts("mscolumn2d","chartobject-5", "100%", "100%", "disparitas_40", "json");
	var dataChartDisparitas40 = {
			"chart": {
				"caption": "Disparitas Brand SMIG dengan Kompetitor 30 hari terakhir",
				"showvalues": "0",
				"plotgradientcolor": "",
				"rotatelabels": "1",
				"slantlabels": "1",
				"formatnumberscale": "0",
				"showplotborder": "0",
				"canvaspadding": "0",
				"bgcolor": "FFFFFF",
				"showalternatehgridcolor": "0",
				"divlinecolor": "CCCCCC",
				"showcanvasborder": "0",
				"legendborderalpha": "0",
				"legendshadow": "0",
				"interactivelegend": "0",
				"showpercentvalues": "1",
				"showsum": "1",
				"canvasborderalpha": "0",
				"showborder": "0",
				"paletteColors":"#8e468e,#a186be,#fff200"
			},
			"categories": [],
			"dataset": []
		};
	function chartDisparitas40(){
		if($("#disparitas_40 .loader").length<1){
			$("#disparitas_40").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#disparitas_40 .loader").show();
		$("#disparitas_40 #chartobject-5").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataDisparitas?kemasan=40&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			dataChartDisparitas40.categories = data.categories;
			dataChartDisparitas40.dataset = data.dataset;
			$("#disparitas_40 .loader").hide();
			$("#disparitas_40 #chartobject-5").show();
			chart_disparitas_40.setChartData(dataChartDisparitas40);
		});
	}
	chartDisparitas40();
	chart_disparitas_40.render("disparitas_40");
}
if(parseInt(kemasan)==50){
	/*-------------------------------------------------------
		ZAK 50KG
	--------------------------------------------------------*/
	
	var boxplot_jual_50 = new FusionCharts({
			type: "boxandwhisker2d",
			id: "chartobject-3", 
			width: "100%", 
			height: "100%", 
			renderAt: "boxplot_jual_50", 
			dataFormat: "json",
			dataSource:{},
			// events:{
				// "legendItemClicked": function (eventObj, dataObj) {
					// console.log(eventObj, dataObj);
				// }
			// }
		});
	var dataChartJual50 = {
		"chart": {
			"caption": "Boxplot Harga Jual",
			"palettecolors": "#cc6600,#afd8f8,#afd8f8,#d64646,#d64646,#b3aa00,#b3aa00,#008ed6,#008ed6,#2dcc00,#2dcc00,#f26d7d,#f26d7d,#f6bd0f,#f6bd0f,#008e8e,#008e8e,#9d080d,#9d080d,#ff8e46,#ff8e46,#fff200,#fff200,#8bba00,#8bba00,#aba000,#aba000,#a186be,#a186be,#8e468e,#8e468e,#588526,#588526,#cc6600",
			"bgcolor":"#ffffff",
			"captionfontsize": "14",
			"subcaptionfontsize": "14",
			"subcaptionfontbold": "0",
			"showalternatehgridcolor": "0",
			"divlinecolor": "CCCCCC",
			"legendshadow": "0",
			"legendposition": "right",
			"showvalues": "0",
			"tooltipcolor": "#ffffff",
			"tooltipbgcolor": "#000000",
			"tooltipbgalpha": "80",
			"tooltippadding": "5",
			"tooltipborderradius": "2",
			"tooltipborderthickness": "0",
			"tooltipbordercolor": "138dd7",
			"showplotborder": "0",
			"showcanvasborder": "0",
			"legendBorderAlpha": "0",
			"canvasborderalpha": "0",
			"showborder": "0",
			"plottooltext": "<div id='headerdiv'>$seriesname</div><div><table width='120' border='1'><tr><td class='labelDiv'>Maximum</td><td class='allpadding'>$maxDatavalue</td></tr><tr><td class='labelDiv'>Q3</td><td class='allpadding'>$Q3</td></tr><tr><td class='labelDiv'>Median</td><td class='allpadding'>$median</td></tr><tr><td class='labelDiv'>Q1</td><td class='allpadding'>$Q1</td></tr><tr><td class='labelDiv'>Minimum</td><td class='allpadding'>$minDataValue</td></tr></table></div>"
		},
		"categories": [],
		"dataset": []
	};
	function boxplotJual50(){
		if($("#boxplot_jual_50 .loader").length<1){
			$("#boxplot_jual_50").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#boxplot_jual_50 .loader").show();
		$("#boxplot_jual_50 #chartobject-3").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataHargaJualPerKemasan?kemasan=50&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			for(var i=0;i<data.categories[0].category.length;i++){
				data.categories[0].category[i]['stepSkipped']=false;
				data.categories[0].category[i]['appliedSmartLabel']=true;
			}
			dataChartJual50.categories=data.categories;
			dataChartJual50.dataset=data.dataset;
			$("#boxplot_jual_50 .loader").hide();
			$("#boxplot_jual_50 #chartobject-3").show();
			boxplot_jual_50.setChartData(dataChartJual50);
			setTimeout(function(){
				$('#boxplot_jual_50 #chartobject-3').append("<div style='position: absolute;top: 17px;right: 94px;'><input type='checkbox' class='p_boxplot_jual_50_all' id='p_boxplot_jual_50_all' checked='checked' name='p_boxplot_jual_50_all' value='true'> <label for='p_boxplot_jual_50_all'>Select All</label></div>");
				$('.p_boxplot_jual_50_all').click(function(){
					if($('.p_boxplot_jual_50_all:checked').val()){
						for(var i=0;i<dataChartJual50.dataset.length;i++){
							dataChartJual50.dataset[i]['visible']=true;
						}
					}else{
						for(var i=0;i<dataChartJual50.dataset.length;i++){
							dataChartJual50.dataset[i]['visible']=false;
						}
					}
					boxplot_jual_50.setChartData(dataChartJual50);
				});
			},2000);
		});
	}
	boxplotJual50();
	boxplot_jual_50.render("boxplot_jual_50");
	$('#boxplot_jual_50').bind('fusionchartslegenditemclicked', function(event, args) {
		console.log(event,args);
	});

	var boxplot_beli_50 = new FusionCharts("boxandwhisker2d","chartobject-4", "100%", "100%", "boxplot_beli_50", "json");
	var dataChartBeli50 = {
		"chart": {
			"caption": "Boxplot Harga Tebus",
			"paletteColors": "#cc6600,#afd8f8,#afd8f8,#d64646,#d64646,#b3aa00,#b3aa00,#008ed6,#008ed6,#2dcc00,#2dcc00,#f26d7d,#f26d7d,#f6bd0f,#f6bd0f,#008e8e,#008e8e,#9d080d,#9d080d,#ff8e46,#ff8e46,#fff200,#fff200,#8bba00,#8bba00,#aba000,#aba000,#a186be,#a186be,#8e468e,#8e468e,#588526,#588526,#cc6600",
			"bgColor": "#ffffff",
			"captionFontSize": "14",
			"subcaptionFontSize": "14",
			"subcaptionFontBold": "0",
			"showAlternateHGridColor": "0",
			"legendShadow": "0",
			"legendPosition": "right",
			"showValues": "0",
			"toolTipColor": "#ffffff",
			"toolTipBgColor": "#000000",
			"toolTipBgAlpha": "80",
			"toolTipPadding": "5",
			"toolTipBorderRadius": "2",
			"toolTipBorderThickness": "0",
			"tooltipbordercolor": "138dd7",
			"showplotborder": "0",
			"showcanvasborder": "0",
			"legendborderalpha": "0",
			"canvasborderalpha": "0",
			"showborder": "0",
			"plottooltext": "<div id='headerdiv'>$seriesname</div><div><table width='120' border='1'><tr><td class='labelDiv'>Maximum</td><td class='allpadding'>$maxDatavalue</td></tr><tr><td class='labelDiv'>Q3</td><td class='allpadding'>$Q3</td></tr><tr><td class='labelDiv'>Median</td><td class='allpadding'>$median</td></tr><tr><td class='labelDiv'>Q1</td><td class='allpadding'>$Q1</td></tr><tr><td class='labelDiv'>Minimum</td><td class='allpadding'>$minDataValue</td></tr></table></div>"
		},
		"categories": [],
		"dataset": []
	};
	
	function boxplotBeli50(){
		if($("#boxplot_beli_50 .loader").length<1){
			$("#boxplot_beli_50").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#boxplot_beli_50 .loader").show();
		$("#boxplot_beli_50 #chartobject-4").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataHargaBeliPerKemasan?kemasan=50&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			dataChartBeli50.categories=data.categories;
			dataChartBeli50.dataset=data.dataset;
			$("#boxplot_beli_50 .loader").hide();
			$("#boxplot_beli_50 #chartobject-4").show();
			boxplot_beli_50.setChartData(dataChartBeli50);
			setTimeout(function(){
				$('#boxplot_beli_50 #chartobject-4').append("<div style='position: absolute;top: 17px;right: 94px;'><input type='checkbox' class='p_boxplot_beli_50_all' id='p_boxplot_beli_50_all' checked='checked' name='p_boxplot_beli_50_all' value='true'> <label for='p_boxplot_beli_50_all'>Select All</label></div>");
				$('.p_boxplot_beli_50_all').click(function(){
					if($('.p_boxplot_beli_50_all:checked').val()){
						for(var i=0;i<dataChartBeli50.dataset.length;i++){
							dataChartBeli50.dataset[i]['visible']=true;
						}
					}else{
						for(var i=0;i<dataChartBeli50.dataset.length;i++){
							dataChartBeli50.dataset[i]['visible']=false;
						}
					}
					boxplot_beli_50.setChartData(dataChartBeli50);
				});
			},2000);
		});
	}
	boxplotBeli50();
	
	boxplot_beli_50.render("boxplot_beli_50");
	
	var bar_margin_50 = new FusionCharts("column2d","chartobject-8", "100%", "100%", "bar_margin_50", "json");
	var dataChartMargin50 = {
		"chart": {
			"caption": "Margin Toko 30 hari Terakhir (%)",
			"paletteColors": "#afd8f8,#f6bd0f,#8bba00,#ff8e46,#008e8e,#d64646,#8e468e,#588526,#b3aa00,#008ed6,#9d080d,#a186be,#cc6600,#2dcc00,#aba000,#f26d7d,#fff200",
			"bgColor": "#ffffff",
			"captionpadding": "20",
			"showvalues": "0",
			"plotgradientcolor": "",
			"rotatelabels": "1",
			"slantlabels": "1",
			"showAlternateHGridColor": "0",
			"divlinealpha": "40",
			"tooltipfontbold": "1",
			"tooltipbgalpha": "80",
			"showtooltipshadow": "0",
			"tooltipbordercolor": "138dd7",
			"showplotborder": "0",
			"showcanvasborder": "0",
			"legendborderalpha": "0",
			"canvasborderalpha": "0",
			"showborder": "0",
		},
		"data": []
	};
	
	function barMargin50(){
		if($("#bar_margin_50 .loader").length<1){
			$("#bar_margin_50").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#bar_margin_50 .loader").show();
		$("#bar_margin_50 #chartobject-8").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataMargin?kemasan=50&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			var datax = [];
			for(var i=0;i<data.length;i++){
				datax.push({"label": data[i].NAME,"value": data[i].MARGIN[0],"tooltext": data[i].NAME+" : "+data[i].MARGIN[0]+"%"});
			}
			dataChartMargin50.data=datax;
			$("#bar_margin_50 .loader").hide();
			$("#bar_margin_50 #chartobject-8").show();
			bar_margin_50.setChartData(dataChartMargin50);
		});
	}
	barMargin50();
	
	bar_margin_50.render("bar_margin_50");	
	
	var chart_disparitas_50 = new FusionCharts("mscolumn2d","chartobject-6", "100%", "100%", "disparitas_50", "json");
	var dataChartDisparitas50 = {
			"chart": {
				"caption": "Disparitas Brand SMIG dengan Kompetitor 30 hari terakhir",
				"showvalues": "0",
				"plotgradientcolor": "",
				"rotatelabels": "1",
				"slantlabels": "1",
				"formatnumberscale": "0",
				"canvaspadding": "0",
				"bgcolor": "FFFFFF",
				"showalternatehgridcolor": "0",
				"divlinecolor": "CCCCCC",
				"legendshadow": "0",
				"interactivelegend": "0",
				"showpercentvalues": "1",
				"showsum": "1",
				"showplotborder": "0",
				"showcanvasborder": "0",
				"legendborderalpha": "0",
				"canvasborderalpha": "0",
				"showborder": "0",
				"paletteColors":"#8e468e,#a186be,#fff200"
			},
			"categories": [],
			"dataset": []
		};
	function chartDisparitas50(){
		if($("#disparitas_50 .loader").length<1){
			$("#disparitas_50").append('<div class="loader" style="margin-top:20%;"></div>');
		}
		$("#disparitas_50 .loader").show();
		$("#disparitas_50 #chartobject-6").hide();
		$.getJSON(base_url+"Harga_tebus_toko/getDataDisparitas?kemasan=50&provinsi="+p_provinsi_selected+"&kota="+p_kota_selected+"&bulan="+p_bulan_selected+"&tahun="+p_tahun_selected, function(data){
			dataChartDisparitas50.categories = data.categories;
			dataChartDisparitas50.dataset = data.dataset;
			$("#disparitas_50 .loader").hide();
			$("#disparitas_50 #chartobject-6").show();
			chart_disparitas_50.setChartData(dataChartDisparitas50);
		});
	}
	chartDisparitas50();
	chart_disparitas_50.render("disparitas_50");
}