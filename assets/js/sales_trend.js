var satuan="Billion";
var satuan_ex="B";
var pembagi=1000000000;
var jenis_rkap="RKAP_REVENUE";
var jenis_real="REV";
var	prognus_capaian="prognus_capaian_revenue";
var	prognus_rkap="prognus_rkap_revenue";
var rata_rkap_bulanan="rata_rkap_revenue_view";
var rata_real_bulanan="rata_revenue_view";
var plant = "";
if(jenis=="volume"){
	satuan='Kilo Ton';
	satuan_ex='KT';
	pembagi=1000;
	jenis_rkap='RKAP_VOLUME';
  	jenis_real="VOL";
	prognus_capaian="prognus_capaian_volume";
	prognus_rkap="prognus_rkap_volume";
	rata_rkap_bulanan="rata_rkap_volume_view";
	rata_real_bulanan="rata_volume_view";
}

function numberFormat(x) {
    var nominal = parseFloat(x).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return nominal.replace(".","|").split(",").join('.').replace('|',',');
}
function DailyTrend(data,datax){
	console.log(plant);
	var prognose = [];
	var prognose2 = [];
	var ratarkap = [];
	var ratareal = [];
	var real = [];
	var rkap = [];
	var ratarkap = [];
	var ratareal = [];
	var label = [];
	var akumulasiPrognose = 0;
	var akumulasiRKAP = 0;
	
	var jumlahRKAP = 0;
	var hariRKAP = 0;
	var jumlahRealisasi = 0;
	var hariRealisasi = 0;
	
	// console.log(data);
	for (var i=0;i<data.DATA_RKAP.length;i++) {
		if(plant && jenis=="volume"){
			var tgl = data.DATA_RKAP[i].BUDAT.slice(6);
			if(tgl!="  "){
				rkap.push(parseFloat(data.DATA_RKAP[i]["TARGET_VOL_HARIAN"])/pembagi);
				label.push(tgl);
				jumlahRKAP+=parseFloat(data.DATA_RKAP[i]["TARGET_VOL_HARIAN"]);
				hariRKAP+=1;
			}
		}else{
			if(data.DATA_RKAP[i].TANGGAL!="  "){
				rkap.push(parseFloat(data.DATA_RKAP[i][jenis_rkap])/pembagi);
				label.push(data.DATA_RKAP[i].TANGGAL);
				jumlahRKAP+=parseFloat(data.DATA_RKAP[i][jenis_rkap]);
				hariRKAP+=1;
			}
		}
	};
	var tgl=1;
	if(data.DATA_RKAP.length<1){
		for (var i=0;i<datax[prognus_capaian].length;i++) {
			if(tgl<=9){
				tglx = '0'+tgl;
			}else{
				tglx = tgl;
			}
			label.push(tglx);
			tgl++;
		};
	}
	for (var i=0;i<data.DATA_ACTUAL.length;i++) {
		real.push(parseFloat(data.DATA_ACTUAL[i][jenis_real])/pembagi);
		jumlahRealisasi+=parseFloat(data.DATA_ACTUAL[i][jenis_real]);
		hariRealisasi+=1;
	};
	if(plant && jenis=="volume"){
		for (var i=0;i<data["prognus_capaian_volume"].length;i++) {
			prognose.push(parseFloat(data["prognus_capaian_volume"][i].nilai)/pembagi);
			akumulasiPrognose = parseFloat(data["prognus_capaian_volume"][i].nilai)/pembagi;
		};
	}else{
		for (var i=0;i<datax[prognus_capaian].length;i++) {
			prognose.push(parseFloat(datax[prognus_capaian][i].nilai)/pembagi);
			akumulasiPrognose = parseFloat(datax[prognus_capaian][i].nilai)/pembagi;
		};
	}
	for (var i=0;i<datax[prognus_rkap].length;i++) {
		prognose2.push(parseFloat(datax[prognus_rkap][i].nilai)/pembagi);
		akumulasiRKAP = parseFloat(datax[prognus_rkap][i].nilai)/pembagi;
	};
	var rataRKAP = (jumlahRKAP/hariRKAP)/pembagi;
	var rataRealisasi = (jumlahRealisasi/hariRealisasi)/pembagi;
	for(var i=0;i<rkap.length;i++){
		ratarkap.push(rataRKAP);
		ratareal.push(rataRealisasi);
	}
	// for (var i=0;i<datax.rata_capaian_volume.length;i++) {
		// prognose2.push(parseFloat(datax.rata_capaian_volume[i].nilai)/pembagi);
	// };
	$('.daily-rkap').html(numberFormat(akumulasiRKAP)+' '+satuan_ex);
	$('.daily-prognose').html(numberFormat(akumulasiPrognose)+' '+satuan_ex);
	$('.daily-selisih').html(numberFormat(akumulasiRKAP-akumulasiPrognose)+' '+satuan_ex);
	
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
		yAxis: [
			{
				title: {
					text: ''
				}
			},
			{ 
				labels: {
					format: '{value} '+satuan,
					style: {
						color: '#666666'
					}
				},
				title: {
					text: 'Prognose',
					style: {
						color: '#666666'
					}
				},
				min: 0,
				opposite: true

			}
		],
        tooltip: {
			formatter: function () {
				var s = '<b>' + this.x + '</b><br />';
				$.each(this.points, function () {
					s += '<i style="font-size:20px;font-weight:bold;color:'+this.color+';">o</i> '+this.series.name+' : '+numberFormat(this.y)+' '+satuan+'<br />';
				});
				return s;
			},
			shared: true
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
	                enabled: false,
	                format: '{point.y:.0f}'+satuan_ex,
	                style: {
		                fontSize: '12px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        },
			column: {
			  grouping: false,
			  shadow: false,
			  borderWidth: 0
			}
	    },
		legend: {
			
		},
		series: [{
					name: 'RKAP',
					color: '#e9d560',
					data: rkap,
	  				pointPadding: 0.05,
					pointPlacement: 0
				},{
					name: 'Realisasi ',
					color: '#22A7F0',
					data: real,
  					pointPadding: 0.25,
					pointPlacement: 0
				},{
					name: 'Prognose',
					yAxis: 1,
					type: 'spline',
					color: '#af20c1',
					data: prognose
				},{
					name: 'Akumulasi RKAP',
					yAxis: 1,
					type: 'spline',
					color: '#2eb149',
					data: prognose2
				},{
					name: 'Rata-Rata RKAP',
					type: 'spline',
					color: '#666666',
					data: ratarkap
				},{
					name: 'Rata-Rata Realisasi',
					type: 'spline',
					color: '#fd671d',
					data: ratareal
				}]
	});
}
function MonthlyTrend(data,datax){
	var prognose = [];
	var prognose2 = [];
	var real = [];
	var rkap = [];
	var ratarkap = [];
	var ratareal = [];
	var akumulasiPrognose = 0;
	var akumulasiRKAP = 0;
	
	var jumlahRKAP = 0;
	var hariRKAP = 0;
	var jumlahRealisasi = 0;
	var hariRealisasi = 0;
	
	var label = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

	for (var i=0;i<data.DATA_RKAP.length;i++) {
		if(plant && jenis=="volume"){
			rkap.push(parseFloat(data.DATA_RKAP[i]["TARGET_VOL"])/pembagi);
			jumlahRKAP+=parseFloat(data.DATA_RKAP[i]["TARGET_VOL"]);
			hariRKAP+=1;
		}else{
			rkap.push(parseFloat(data.DATA_RKAP[i][jenis_rkap])/pembagi);
			jumlahRKAP+=parseFloat(data.DATA_RKAP[i][jenis_rkap]);
			hariRKAP+=1;
		}
	};
	for (var i=0;i<data.DATA_ACTUAL.length;i++) {
		real.push(parseFloat(data.DATA_ACTUAL[i][jenis_real])/pembagi);
		jumlahRealisasi+=parseFloat(data.DATA_ACTUAL[i][jenis_real]);
		hariRealisasi+=1;
	};
	for (var i=0;i<datax[prognus_capaian].length;i++) {
		prognose.push(parseFloat(datax[prognus_capaian][i].nilai)/pembagi);
		akumulasiPrognose = parseFloat(datax[prognus_capaian][i].nilai)/pembagi;
	};
	for (var i=0;i<datax[prognus_rkap].length;i++) {
		prognose2.push(parseFloat(datax[prognus_rkap][i].nilai)/pembagi);
		akumulasiRKAP = parseFloat(datax[prognus_rkap][i].nilai)/pembagi;
	};
	var rataRKAP = (jumlahRKAP/hariRKAP)/pembagi;
	var rataRealisasi = (jumlahRealisasi/hariRealisasi)/pembagi;
	for(var i=0;i<rkap.length;i++){
		ratarkap.push(rataRKAP);
		ratareal.push(rataRealisasi);
	}
	$('.monthly-rkap').html(numberFormat(akumulasiRKAP)+' '+satuan_ex);
	$('.monthly-prognose').html(numberFormat(akumulasiPrognose)+' '+satuan_ex);
	$('.monthly-selisih').html(numberFormat(akumulasiRKAP-akumulasiPrognose)+' '+satuan_ex);
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
		yAxis: [{
				title: {
					text: ''
				}
			},
			{ 
				labels: {
					format: '{value} '+satuan,
					style: {
						color: '#666666'
					}
				},
				title: {
					text: 'Prognose',
					style: {
						color: '#666666'
					}
				},
				min: 0,
				opposite: true
		}],
        tooltip: {
			formatter: function () {
				var s = '<b>' + this.x + '</b><br />';
				$.each(this.points, function () {
					s += '<i style="font-size:20px;font-weight:bold;color:'+this.color+';">o</i> '+this.series.name+' : '+numberFormat(this.y)+' '+satuan+'<br />';
				});
				return s;
			},
			shared: true
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
	                enabled: false,
	                format: '{point.y:.0f}'+satuan_ex,
	                style: {
		                fontSize: '12px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        },
	        column: {
			  grouping: false,
			  shadow: false,
			  borderWidth: 0
			}
	    },
		legend: {
			enabled: true
		},
		series: [{
					name: 'RKAP',
					color: '#e9d560',
					data: rkap,
	  				pointPadding: 0.05,
					pointPlacement: 0
				},{
					name: 'Realisasi ',
					color: '#22A7F0',
					data: real,
  					pointPadding: 0.25,
					pointPlacement: 0
				},{
					name: 'Prognose',
					yAxis: 1,
					type: 'spline',
					color: '#af20c1',
					data: prognose
				},{
					name: 'Akumulasi RKAP',
					yAxis: 1,
					type: 'spline',
					color: '#2eb149',
					data: prognose2
				},{
					name: 'Rata-Rata RKAP',
					type: 'spline',
					color: '#666666',
					data: ratarkap
				},{
					name: 'Rata-Rata Realisasi',
					type: 'spline',
					color: '#fd671d',
					data: ratareal
				}]
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

function getTrendDaily(){
	var d = new Date();
	var month = d.getMonth();
	month = month+1;
	if(month<=9){
		month ='0'+month;
	}
	var url_daily = 'Sales_revenue_bpc/VolumeRevenue_TREND_SMIG/';
	var url_pro_daily = 'Sales_revenue/Prognus_bulanan_smig/';
	if(opco){
		url_daily = 'Sales_revenue_bpc/VolumeRevenue_TREND_PER_OPCO/'+opco;
		url_pro_daily = 'Sales_revenue/Prognus_bulanan_opco?org='+opco;
		if(jenis=="volume"){
			if(plant!=""){
				url_daily = 'Sales_revenue_bpc/volumerevenue_trendharian_plant_opco?kdplant='+plant+'&tahun=2018&bulan='+month;
			}else{
				url_daily = 'Sales_revenue_bpc/VolumeRevenue_TREND_PER_OPCO/'+opco;
			}
		}else{
			url_daily = 'Sales_revenue_bpc/VolumeRevenue_TREND_PER_OPCO/'+opco;
		}
	}
	$.getJSON(base_url+url_daily, function(data){
		$.getJSON(base_url+url_pro_daily, function(datax){
			DailyTrend(data,datax);
		});
	});
}

getTrendDaily();


function getTrendMonth(){
	var url_monthly = 'Sales_revenue_bpc/VolumeRevenue_TRENDBULAN_SMIG/';
	var url_pro_monthly = 'Sales_revenue/Prognus_tahunan_smig/';
	if(opco){
		if(jenis=="volume"){
			if(plant!=""){
				url_monthly = 'Sales_revenue_bpc/VolumeRevenue_TRENDBULAN_PLANT_OPCO?kdplant='+plant+'&tahun=2018';
			}else{
				url_monthly = 'Sales_revenue_bpc/VolumeRevenue_TRENDBULAN_PER_OPCO/'+opco;
			}
		}else{
			url_monthly = 'Sales_revenue_bpc/VolumeRevenue_TRENDBULAN_PER_OPCO/'+opco;
		}
		url_pro_monthly = 'Sales_revenue/Prognus_tahunan_opco?org='+opco;
	}
	$.getJSON(base_url+url_monthly, function(data){
		$.getJSON(base_url+url_pro_monthly, function(datax){
			MonthlyTrend(data,datax);
		});
	});
}

getTrendMonth();
/*----------------- tambahan plant ---------------------*/
$.getJSON(base_url+"Sales_revenue_bpc/getplantbyopco?opco="+opco, function(data){
	// console.log(data);
	var htmlx = "<option value=''>All Plant</option>";
	if(data.DATA.length>0){
		for(var i=0;i<data.DATA.length;i++){
			htmlx += "<option value='"+data.DATA[i].KD_PLANT+"'>"+data.DATA[i].NAMA_PLANT+"</option>";
		}
	}
	$(".p_plant").html(htmlx);
});
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
$(document).ready(function() {
	$(".burger-menu").addClass("backtoparent");

	var cmpny = window.location.href,
	parts = cmpny.split("/"),
    url1 = parts[parts.length-1];
    url2 = parts[parts.length-2];
    if(url1=="volume"||url1=="revenue"){
    	last_part=url1;
    }else{
    	last_part=url2+"_detail/"+url1;
    }
    $("#sidenav").hide();
	$(".backtoparent").click(function(){
		$(this).css({"opacity":"0"});
		document.location.href = base_url+"sales_dashboard/"+last_part;
	});
	$(".p_plant").change(function(){
		plant = $(this).val();
		getTrendDaily(plant);
		getTrendMonth(plant);
	});
    var table = $('#volume_plant').DataTable({
        "ajax": base_url+"/Sales_revenue_bpc/reportperplant?opco=7000&tahun=2018&bulan=01",
		"searching": false,
		"bPaginate": false,
		"bInfo" : false,
		"paging": false,
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "NAME" },
            { "data": "TARGETZAK", render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            { "data": null },
            { "data": "REALZAK", render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            { "data": "REALCUR", render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            { "data": "TARGETMOUNTZAK", render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            { "data": null },
            { "data": "REALMOUNTZAK", render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            { "data": "REALMOUNTCUR", render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
            { "data": null },
            { "data": null }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#volume_plant tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });
	
	$('.sfs').change(function(){
		
	});

	var pathArray = window.location.pathname.split( '/' );
	var link = '<div class="dropdown show"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i id="icon_achievement_rev" class="fa fa-3x fa-sort-desc" aria-hidden="true" align="left"></i></a><div class="dropdown-menu" aria-labelledby="dropdownMenuLink"><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/'+pathArray[5]+'&#39;)">SMIG</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/'+pathArray[5]+'&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/'+pathArray[5]+'_detail/7000&#39;)">Semen Indonesia</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/'+pathArray[5]+'/7000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/'+pathArray[5]+'_detail/3000&#39;)">Semen Padang</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/'+pathArray[5]+'/3000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/'+pathArray[5]+'_detail/5000&#39;)">Semen Gresik</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/'+pathArray[5]+'/5000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/'+pathArray[5]+'_detail/4000&#39;)">Semen Tonasa</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/'+pathArray[5]+'/4000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/'+pathArray[5]+'_detail/6000&#39;)">Thang Long</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/'+pathArray[5]+'/6000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a></div></div>';
	$('#page_title').append(link);
});