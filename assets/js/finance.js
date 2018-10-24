var jenis="REVENUE";
var satuan="Billion";
var satuan_ex="B";
var pembagi=1000000000;
var jenis_rkap="RKAP_REVENUE";
var jenis_real="REV";
if(jenis=="volume"){
	satuan='Kilo Ton';
	satuan_ex='KT';
	pembagi=1000;
	jenis_rkap='RKAP_VOLUME';
  	jenis_real="VOL";
}

function DailyTrend(data){
	var prognose = [];
	var coh = [];
	var ap = [];
	var ar = [];
	var label = [];
	
	
	var labelMon = [];
	var cohMon = [];
	var apMon = [];
	var arMon = [];
	for (var i=0;i<data.DATA_CASH_ON_HAND.length;i++) {
		if(opco){
			if(data.DATA_CASH_ON_HAND[i].TGL!="  " && data.DATA_CASH_ON_HAND[i].FLAG=="2"){
				coh.push(parseFloat(data.DATA_CASH_ON_HAND[i].JUMLAH)/pembagi);
				label.push(data.DATA_CASH_ON_HAND[i].TGL);
			}
			if(data.DATA_CASH_ON_HAND[i].TGL!="  " && data.DATA_CASH_ON_HAND[i].FLAG=="3"){
				cohMon.push(parseFloat(data.DATA_CASH_ON_HAND[i].JUMLAH)/pembagi);
				labelMon.push(data.DATA_CASH_ON_HAND[i].TGL);
			}
		}else{
			if(data.DATA_CASH_ON_HAND[i].TGL!="  " && data.DATA_CASH_ON_HAND[i].FLAG=="2"){
				coh.push(parseFloat(data.DATA_CASH_ON_HAND[i].TOTAL)/pembagi);
				label.push(data.DATA_CASH_ON_HAND[i].TGL);
			}
			if(data.DATA_CASH_ON_HAND[i].TGL!="  " && data.DATA_CASH_ON_HAND[i].FLAG=="3"){
				cohMon.push(parseFloat(data.DATA_CASH_ON_HAND[i].TOTAL)/pembagi);
				labelMon.push(data.DATA_CASH_ON_HAND[i].TGL);
			}
		}
	};
	for (var i=0;i<label.length;i++) {
		var val = 0;
		for(var a=0;a<data.DATA_AP.length;a++){
			if(label[i]==data.DATA_AP[a].TANGGAL){
				val = parseFloat(data.DATA_AP[a].TOTAL)/pembagi;
			}
		}
		ap.push(val);
	};
	for (var i=0;i<label.length;i++) {
		var val = 0;
		for(var a=0;a<data.DATA_AR.length;a++){
			if(label[i]==data.DATA_AR[a].TANGGAL){
				val = parseFloat(data.DATA_AR[a].TOTAL)/pembagi;
			}
		}
		ar.push(val);
	};
	console.log(ar);
	console.log(ap);
	console.log(coh);
	for (var i=0;i<labelMon.length;i++) {
		var val = 0;
		for(var a=0;a<data.DATA_AP.length;a++){
			if(labelMon[i]==data.DATA_AP[a].TANGGAL){
				val = parseFloat(data.DATA_AP[a].TOTAL)/pembagi;
			}
		}
		apMon.push(val);
	};
	for (var i=0;i<labelMon.length;i++) {
		var val = 0;
		for(var a=0;a<data.DATA_AR.length;a++){
			if(labelMon[i]==data.DATA_AR[a].TANGGAL){
				val = parseFloat(data.DATA_AR[a].TOTAL)/pembagi;
			}
		}
		arMon.push(val);
	};
	MonthlyTrend(labelMon, cohMon, apMon, arMon);
	$('#dailyTrend').highcharts({
		chart: {
			type: 'column',
			spacingBottom: 8,
			spacingTop: 8,
			spacingLeft: 5,
			spacingRight: 5,
			animation: Highcharts.svg
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: label,
			tickInterval: 1,
			gridLineWidth: 1
		},
		yAxis: {
			title: {
				text: ''
			}
		},
        tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				return s + ':<br>' + numberFormat(n)+' '+satuan;
			}

		},
        credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
        plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.0f}'+satuan_ex,
	                style: {
		                fontSize: '12px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
		legend: {
			enabled: true
		},
		series: [{
			name: 'Income',
			color: '#a5d075',
			data: ar,
		},{
			name: 'Expenses',
			color: '#D91E18',
			data: ap,
		},{
			type: 'spline',
			name: 'Cash On Hand',
			color: '#22A7F0',
			data: coh,
			// pointPadding: 0.25,
			// pointPlacement: 0
		}
		]
	});
}
function MonthlyTrend(label, coh, ap, ar){
	var prognose = [];
	var real = [];
	var rkap = [];
	// var label = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

	$('#monthlyTrend').highcharts({
		chart: {
			type: 'column',
			spacingBottom: 8,
			spacingTop: 8,
			spacingLeft: 5,
			spacingRight: 5,
			animation: Highcharts.svg
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: label,
			tickInterval: 1,
			gridLineWidth: 1
		},
		yAxis: {
			title: {
				text: ''
			}
		},
        tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				return s + ':<br>' + numberFormat(n)+' '+satuan;
			}

		},
        credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
        plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.0f}'+satuan_ex,
	                style: {
		                fontSize: '12px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
		legend: {
			enabled: true
		},
		series: [{
			name: 'Income',
			color: '#a5d075',
			data: ar,
		},{
			name: 'Expenses',
			color: '#D91E18',
			data: ap,
		},{
			type: 'spline',
			name: 'Cash On Hand',
			color: '#22A7F0',
			data: coh,
			// pointPadding: 0.25,
			// pointPlacement: 0
		}
		]
	});
}
function format_number(nominal){
	if((typeof nominal)=="string"){
		nominal = nominal.split(',').join('');
		nominal = parseFloat(nominal);
	}
	return nominal;
}
function numberFormat(x) {
    var nominal = parseFloat(x).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return nominal.replace(".","|").split(",").join('.').replace('|',',');
}

var url_daily = 'Cash_liquidity/get_trend_AP_smig/';
var url_monthly = 'Sales_revenue_bpc/VolumeRevenue_TRENDBULAN_SMIG/';
var url_coh = 'Finance/get_data_Coh_Ap_Ar/';
var url_bank = 'Finance/get_data_bank_smig/';
var url_curr = 'Cash_liquidity/getCurrToday_Allopco/';
if(opco){
	url_daily = 'Cash_liquidity/get_trend_AP_opco?opco='+opco;
	url_monthly = 'Sales_revenue_bpc/VolumeRevenue_TRENDBULAN_PER_OPCO/'+opco;
	// url_coh = 'Finance/get_data_Coh_Ap_Ar/?org='+opco;
	url_coh = 'Finance/get_data_Coh_Ap_Ar/';
	url_bank = 'Finance/get_data_bank_opco/?org='+opco;
	url_curr = 'Cash_liquidity/getCurrToday_peropco?opco='+opco;
}
$.getJSON(base_url+url_daily, function(data){
	DailyTrend(data);
});
$.getJSON(base_url+url_coh, function(data){
	var pembagi = 1000000;
	for(var i=0;i<data.data_smig_dan_opco.length;i++){
		var datax = data.data_smig_dan_opco[i];
		$(".cash-"+datax.OPCO+" .cash-todate .cash").html(numberFormat(format_number(datax.COH_DAY)/pembagi));
		$(".cash-"+datax.OPCO+" .cash-todate .receipt").html(numberFormat(format_number(datax.AR_DAY)/pembagi));
		$(".cash-"+datax.OPCO+" .cash-todate .disburstment").html(numberFormat(format_number(datax.AP_DAY)/pembagi));
		
		$(".cash-"+datax.OPCO+" .cash-monthtodate .cash").html(numberFormat(format_number(datax.COH_MONTH)/pembagi));
		$(".cash-"+datax.OPCO+" .cash-monthtodate .receipt").html(numberFormat(format_number(datax.AR_MONTH)/pembagi));
		$(".cash-"+datax.OPCO+" .cash-monthtodate .disburstment").html(numberFormat(format_number(datax.AP_MONTH)/pembagi));
		
		$(".cash-"+datax.OPCO+" .cash-yeartodate .cash").html(numberFormat(format_number(datax.COH_YEAR)/pembagi));
		$(".cash-"+datax.OPCO+" .cash-yeartodate .receipt").html(numberFormat(format_number(datax.AR_YEAR)/pembagi));
		$(".cash-"+datax.OPCO+" .cash-yeartodate .disburstment").html(numberFormat(format_number(datax.AP_YEAR)/pembagi));
	}
});
$.getJSON(base_url+url_bank, function(data){
	var pembagi = 1000000;
	
	var html = "";
	var tot_data = data.data_bank_idr.length;
	var tot_loop = parseInt(tot_data/4);
	var tot_real_loop = ((tot_loop*4)<tot_data)? tot_loop+1 : tot_loop;
	for(var i=0;i<tot_real_loop;i++){
		html += '<div class="col-xs-3 nopadding">';
		html += '	<table class="table table-striped">';
		for(a=0;a<4;a++){
			var datax = data.data_bank_idr[a+(i*4)];
			if(datax){
				html += '		<tr>';
				html += '			<td>'+datax.HBKID+'</td>';
				html += '			<td>'+numberFormat(format_number(datax.JUMLAH_DATA)/pembagi)+'</td>';
				html += '		</tr>';
			}
		}
		html += '	</table>';
		html += '</div>';
	}
	$(".bank").html(html);
});
$.getJSON(base_url+url_curr, function(data){
	var pembagi = 1000000;
	var html = "";
	if(opco){
		for(a=0;a<data.length;a++){
			var datax = data[a];
			var kurs = datax.JENIS;
			if(datax.JENIS=="IDR"){
				kurs += ' mio';
				datax.value = format_number(datax.value)/pembagi;
			}
			html += '<div><img src="assets/images/ic_finance/ic-'+datax.JENIS+'.png"><span> '+numberFormat(datax.value)+'<p>In '+kurs+'</p></span></div>';
		}
	}else{
		for (x in data) {
			var kurs = x;
			if(x=="IDR"){
				kurs += ' mio';
				data[x] = format_number(data[x])/pembagi;
			}
			html += '<div><img src="assets/images/ic_finance/ic-'+x+'.png"><span> '+numberFormat(data[x])+'<p>In '+kurs+'</p></span></div>';
		}
	}
	$(".currency").html(html);
});
