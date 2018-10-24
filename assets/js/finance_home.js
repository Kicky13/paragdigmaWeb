// Value   => Revenue = 1, Cost of Revenue = 2+3, Operation Expanse = 4, EBITDA = 5, Net Profit = 6
// Per Ton => Revenue = 7, Cost of Revenue = 8+9, Operation Expanse = 10, EBITDA = 11, Net Profit = 12

$(document).ready(function(){
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";
	// var base_url = "http://eis.semenindonesia.com/";

	var datas = [];
	var dataAllCement = [];
	var dataAllNonCement = [];
	var type = false;
	var choose = 3;
	var todate = false;
	var bulan = $('#month').val();
	var tahun = $('#year').val();
	var opco = "1000";
	var etype=false;

	function numberFormat(x) { 
	    return parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	$('.find').click(function(){
		$(".loading_overlay").removeClass("opacity-on");
		bulan = $('#month').val();
		tahun = $('#year').val();
		sessionStorage.setItem("saveParam", JSON.stringify({bulan, tahun}));
		loadData(bulan, tahun);
		loadAllData(bulan, tahun);
	});

	function loadData(bulan, tahun){
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};

		$.getJSON(base_url+"Finance_report/show/tampil?time="+tahun+"."+bulan+"&comp=1000&etipe="+etype, function(data){
			datas = data.result;
			view(datas, type, choose);
		});

	};
	loadData(bulan, tahun);

	function loadAllData(bulan, tahun){
		dataAllCement = [];
		dataAllNonCement = [];
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};
		var typeCement =['7000', '2000', '3000', '4000', '5000', '6000', '8000', '9000'];
		var typeNonCement =['2100', '2200', '2300', '2710', '2720', '2730', '2740', '3100', '3200', '3710', '3720', 'G100', 'G200', 'G300', 'G400', 'G500'];

		for(var i=0;i<typeCement.length;i++){
			$.getJSON(base_url+"Finance_report/show/tampil?time="+tahun+"."+bulan+"&comp="+typeCement[i]+"&etipe="+etype, function(data){
				dataAllCement.push(data.result);
			});

		}
		for(var j=0;j<typeNonCement.length;j++){
			$.getJSON(base_url+"Finance_report/show/tampil?time="+tahun+"."+bulan+"&comp="+typeNonCement[j]+"&etipe="+etype, function(data){
				dataAllNonCement.push(data.result);
			});

		}
		console.log(dataAllCement);
		console.log(dataAllNonCement);
	}
	loadAllData(bulan, tahun);
	var satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
	$(".actual_title").html(satuan);
	$('.total').change(function() {
		var r = $(this).attr('rel');
		if(r==1){
			type=$(this).prop('checked');
			if(type==false){
				if(choose==10){
					choose=3;
				}else if(choose==11){
					choose=4;
				}else if(choose==12){
					choose=5;
				}else if(choose==13){
					choose=6;
				}else if(choose==14){
					choose=7;
				}
				satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
			}else{
				if(choose==3){
					choose=10;
				}else if(choose==4){
					choose=11;
				}else if(choose==5){
					choose=12;
				}else if(choose==6){
					choose=13;
				}else if(choose==7){
					choose=14;
				}
				satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in Kilo Ton)</font>';
			}
			$(".actual_title").html(satuan);
		}else if(r==3){
			todate=$(this).prop('checked');
		};
		view(datas, type, choose);
	}) 
	$(".totals").click(function(e){
		e.preventDefault();
		var r = $(this).attr('rel');
		if(r!=3){
			$(".total").removeClass('active');
			$(this).addClass('active');
		}
		if(r==1){
			type = true;
			if(choose==10){
				choose=3;
			}else if(choose==11){
				choose=4;
			}else if(choose==12){
				choose=5;
			}else if(choose==13){
				choose=6;
			}else if(choose==14){
				choose=7;
			}
			satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
		}else if(r==2){
			type = false;
			if(choose==3){
				choose=10;
			}else if(choose==4){
				choose=11;
			}else if(choose==5){
				choose=12;
			}else if(choose==6){
				choose=13;
			}else if(choose==7){
				choose=14;
			}
			satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in Kilo Ton)</font>';
		}else if(r==3){
			if($(this).hasClass('choosed')){
				todate = false;
				$(this).removeClass('choosed');
				$(this).html('Month to date');
			}else{
				todate = true;
				$(this).addClass('choosed');
				$(this).html('Year to date');
			}
		};
		$(".actual_title").html(satuan);
		view(datas, type, choose);
	});

	$(".block").click(function(){
		var r = $(this).attr('rel');
		var title = $(this).data('name');
		$(".tittle_head").html(title);
		$(".block").removeClass('active');
		$(this).addClass('active');
		if(type==false){
			if(r==1){
				choose = 3;
			}else if(r==2){
				choose = 4;
			}else if(r==3){
				choose = 5;
			}else if(r==4){
				choose = 6;
			}else{
				choose = 7;
			};
		}else{
			if(r==1){
				choose = 10;
			}else if(r==2){
				choose = 11;
			}else if(r==3){
				choose = 12;
			}else if(r==4){
				choose = 13;
			}else{
				choose = 14;
			};
		}
		view(datas, type, choose)
	});

	function view(data, type, choose){
		var rkap = act = actbl = actyl = rkap1 = rkap2 = rkap3 = rkap4 = rkap5 = act1 = act2 = act3 = act4 = act5 = 0;
		var actmomval = actyoyval = actmom = actyoy = persen1 = persen2 = persen3 = persen4 = persen5 = '0%';
		var pembagi=1000000;
		if(todate){
			if(type==false){
				rkap1 = data[3].val6/pembagi;
				rkap4 = data[6].val6/pembagi;
				rkap5 = data[7].val6/pembagi;

				act1 = data[3].val7/pembagi;
				act4 = data[6].val7/pembagi;
				act5 = data[7].val7/pembagi;

				lact1 = data[3].val8/pembagi;
				lact4 = data[6].val8/pembagi;
				lact5 = data[7].val8/pembagi;

				persen1 = data[3].val10;
				persen4 = data[6].val10;
				persen5 = data[7].val10;
			}else{
				rkap1 = data[10].val6/pembagi;
				rkap4 = data[13].val6/pembagi;
				rkap5 = data[14].val6/pembagi;

				act1 = data[10].val7/pembagi;
				act4 = data[13].val7/pembagi;
				act5 = data[14].val7/pembagi;

				lact1 = data[10].val8/pembagi;
				lact4 = data[13].val8/pembagi;
				lact5 = data[14].val8/pembagi;

				persen1 = data[10].val10;
				persen4 = data[13].val10;
				persen5 = data[14].val10;
			}
		}else{
			if(type==false){
				rkap1 = data[3].val1/pembagi;
				rkap4 = data[6].val1/pembagi;
				rkap5 = data[7].val1/pembagi;

				act1 = data[3].val2/pembagi;
				act4 = data[6].val2/pembagi;
				act5 = data[7].val2/pembagi;

				lact1 = data[3].val3/pembagi;
				lact4 = data[6].val3/pembagi;
				lact5 = data[7].val3/pembagi;

				persen1 = data[3].val5;
				persen4 = data[6].val5;
				persen5 = data[7].val5;
			}else{
				rkap1 = data[10].val1/pembagi;
				rkap4 = data[13].val1/pembagi;
				rkap5 = data[14].val1/pembagi;

				act1 = data[10].val2/pembagi;
				act4 = data[13].val2/pembagi;
				act5 = data[14].val2/pembagi;

				lact1 = data[10].val3/pembagi;
				lact4 = data[13].val3/pembagi;
				lact5 = data[14].val3/pembagi;

				persen1 = data[10].val5;
				persen4 = data[13].val5;
				persen5 = data[14].val5;
			}

		}


		$("#box1 .valbudget").html(numberFormat(rkap1));
		$("#box2 .valbudget").html(numberFormat(rkap4));
		$("#box3 .valbudget").html(numberFormat(rkap5));

		$("#box1 .valactual").html(numberFormat(act1));
		$("#box2 .valactual").html(numberFormat(act4));
		$("#box3 .valactual").html(numberFormat(act5));

		$("#box1 .vallastactual").html(numberFormat(lact1));
		$("#box2 .vallastactual").html(numberFormat(lact4));
		$("#box3 .vallastactual").html(numberFormat(lact5));

		$("#box1 .valyoy").html(persen1);
		$("#box2 .valyoy").html(persen4);
		$("#box3 .valyoy").html(persen5);

		var percent1 = parseInt(parseFloat((act1/rkap1)*100).toFixed(0));
		var percent2 = parseInt(parseFloat((act4/rkap4)*100).toFixed(0));
		var percent3 = parseInt(parseFloat((act5/rkap5)*100).toFixed(0));

		console.log(percent1, percent2, percent3);
		var gaugeOptions = {

		    chart: {
		        type: 'solidgauge',
		        backgroundColor: 'rgba(0, 255, 0, 0)'
		    },

		    title: null,

		    pane: {
		        center: ['50%', '85%'],
		        size: '140%',
		        startAngle: -90,
		        endAngle: 90,
		        background: {
		            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
		            innerRadius: '60%',
		            outerRadius: '100%',
		            shape: 'arc'
		        }
		    },

		    tooltip: {
		        enabled: false
		    },

		    // the value axis
		    yAxis: {
		        stops: [
		            [0.1, '#DF5353'], // green
		            [0.5, '#DDDF0D'], // yellow
		            [0.9, '#55BF3B'] // red
		        ],
		        lineWidth: 0,
		        minorTickInterval: null,
		        tickAmount: 2,
		        title: {
		            y: -70
		        },
		        labels: {
		            y: 16
		        }
		    },

		    plotOptions: {
		        solidgauge: {
		            dataLabels: {
		                y: 5,
		                borderWidth: 0,
		                useHTML: true
		            }
		        }
		    }
		};

		var chart1 = Highcharts.chart('revchart', Highcharts.merge(gaugeOptions, {
		    yAxis: {
		        min: 0,
		        max: 100
		    },
		    credits: {
		        enabled: false
		    },
		    series: [{
		        data: [percent1],
		        dataLabels: {
		            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
		                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><b style="position:relative;top:-10px;opacity:.5;">%</b>'
		        },
		        tooltip: {
		            valueSuffix: ' km/h'
		        }
		    }]
		}));
		var chart2 = Highcharts.chart('ebitchart', Highcharts.merge(gaugeOptions, {
		    yAxis: {
		        min: 0,
		        max: 100
		    },
		    credits: {
		        enabled: false
		    },
		    series: [{
		        data: [percent2],
		        dataLabels: {
		            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
		                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><b style="position:relative;top:-10px;opacity:.5;">%</b>'
		        },
		        tooltip: {
		            valueSuffix: ' km/h'
		        }
		    }]
		}));
		var chart3 = Highcharts.chart('eatchart', Highcharts.merge(gaugeOptions, {
		    yAxis: {
		        min: 0,
		        max: 100
		    },
		    credits: { 
		        enabled: false
		    },
		    series: [{
		        data: [percent3],
		        dataLabels: {
		            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
		                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><b style="position:relative;top:-10px;opacity:.5;">%</b>'
		        },
		        tooltip: {
		            valueSuffix: ' km/h'
		        }
		    }]
		}));




		$(".loading_overlay").addClass("opacity-on");
	}
});

